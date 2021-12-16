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

	 class UserContr extends User {

		public function createAccount($username, $password, $email){

			$result = null;
			if(!preg_match("/[a-zA-Z0-9]$/", $username)){
				$result = false;
				header("location: login.php?error=invalidUser");
				exit();
			}
			elseif(!preg_match("/[a-zA-Z0-9!@#$-_]$/", $password)){
				$result = false;
				header("location: login.php?error=invalidPassword");
				exit();
			}
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$result = false;
				header("location: login.php?error=invalidEmail");
				exit();
			}else{
				$result = true;
			}

			if($result == true){
				$message = $this->createUser($username, $password, $email);
				if($message == true){
					return $message;
				}else{
					echo "There was an error";
				}
			}

		}

		public function deleteAccount($username, $id){
			$result = null;
			$delCheck = $this->deleteUser($username, $id);

			if($delCheck == true){
				$result = true;
			}else{
				$result = false;
			}

			return $result;
		}

		public function lostPass($uid){
			// Pull Email from database
			$row = $this->resetPass($uid);
			$email = $row[0]['email'];
			
			//Create Token & Submit to password reset db
			$sendPwd = $this->sendPass($email);
			$token = $sendPwd['token'];
			$email = $sendPwd['email'];
			
			// FINISH SERVER CLASS FUNCTIONS FOR 
			// DOMAIN / SERVER INFORMATION 
			$server_domain = 'www.debuggingbytes.com';
			$to = $email;
			$message = "
			Our system shows that you have requested to reset your password.
			Please click the following link to reset your password <a href='".
			$server_domain ."/reset_password.php?email=". $email . "&token=". $token."'>Reset Password</a>\r\n
			if you did not request your password to be reset, you can ignore this email.";

			$subject = "Password Reset Request";
			$from = "from: noreply@".$server_domain;
			#mail($to, $subject, $message, $from);
			echo "<pre>".$message."</pre>";
		}
		public function login($userID, $password){
			$result = $this->loginUser($userID, $password);
			return $result;
		}
		public function logoutUser(){
			#session_start();
			session_unset();
			session_destroy();
			header("location: ". $_SERVER['PHP_SELF']);
			
		}

		public function updateUser(){
			
		}
		 
	 }