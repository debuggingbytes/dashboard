<?php
	/**
	 * User Controller Class
	 * Rebuild on November 14-2021
	 * to Follow MVC Model
	 * Created by: Kris Cartmell
	 * www.debuggingbytes.com
	 * 
	 *  User controller class 
	 *  Methods put data into database
	 */

	class User extends Dbh {

		// User View Methods

		protected function getUser($uid){
			$sql = "SELECT * FROM db_cms_users WHERE id= ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid]);

			if($stmt->rowCount() == 0){
				$stmt = null;
				header("location: ");
				exit();
			}
			$row = $stmt->fetchAll();
			return $row;
		}
		protected function getUsername($username){
			$sql = "SELECT * FROM db_cms_users WHERE username = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$username]);

			if(!$stmt->rowCount() == 0){
				$result = false;
				header("location: login.php?error=usertaken");
				exit();
			}else{
				$result = true;
			}
			return $result;
		}

		// User Controller methods

		protected function createUser($username, $password, $email){

			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = 'INSERT INTO db_cms_users (username, password, email) VALUES (?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$username, $password, $email]);
			if(!$stmt){
				$result = false;
			}else{
				$result = true;
			}
			return $result;

		}

		protected function deleteUser($username, $id){
			$sql = "DELETE FROM db_cms_users WHERE id = ? AND username = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$username, $id]);

			if(!$stmt){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		/**
		 * Created November 14th, 2021
		 * Reset Password methods is 3 steps
		 */
		//Method #1
		protected function resetPass($uid){
			$result = null;
			$sql = "SELECT email FROM db_cms_users WHERE username = ? OR email = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid, $uid]);

			if($stmt->rowCount() == 0){
				$result = false;
				header("location: login.php?error=usernotfound");
				exit();
			}else{
				$result = true;
			}

			if($result != true){
				echo "There was an error";
			}else{
				$row = $stmt->fetchAll();
			}
			return $row;
		}
		//Method #2
		protected function sendPass($email){
			$tokenExpires = date("Y-m-d H:i:s", time()+3600);
			$token = $this->token(32);

			$sql = "INSERT INTO db_cms_resetPwd (email, token, expires) VALUES (?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$email, $token, $tokenExpires]);
			if(!$stmt){
				echo "There was an error";
				exit();
			}
			
			$result = array(
				'token' => $token,
				'email' => $email
			);
			return $result;
		}
		// Method #3
		protected function token($length){
			if($length <= 15){
				echo "failed length";
				exit();
			}
			$token = bin2hex(random_bytes($length));
			return $token;
		}

		/**
		 * login user function
		 */
		protected function loginUser($userID, $password) {
			$sql = "SELECT username, id, password FROM db_cms_users WHERE username = ? OR email = ?";
			$stmt = $this->connect()->prepare($sql);
		
			if(!$stmt->execute([$userID, $userID])) {
				$stmt = null;
				header("location: index.php?error=failstmt");
				exit();
			}
		
			if($stmt->rowCount() == 0) {
				$stmt = null;
				header("location: login.php?error=loginerror");
				exit();
			}
			
			$user = $stmt->fetchAll();
			$checkPwd = password_verify($password, $user[0]['password']);
				
			if($checkPwd == false) {
				header("location: index.php?error=loginerror");
				exit();
			}
			elseif($checkPwd == true) {
				session_start();
				$_SESSION['username'] = $user[0]['username'];
				$_SESSION['uid'] = $user[0]['id'];
				return true;
			}
		}
		 
	 }