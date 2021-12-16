<?php

	class ViewOrders extends dbh {

		// Pull Orders
		public function ViewAll(){
			//Prepare SQL
			$sql = "SELECT * FROM db_orders";
			$stmt = $this->connect()->query($sql);
			$stmt->execute();

			$row = $stmt->fetchAll();
			
			return $row;
		}
		public function ViewOrder($uid){
			//Prepare SQL
			$sql = "SELECT * FROM db_orders WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid]);

			$row = $stmt->fetch();
			
			return $row;
		}

		public function invoiceStatus($sent, $due){
			//Convert Times to Epoch Time
			$sent = strtotime($sent);
			$due = strtotime($due);
			//is the invoice due?
			if($due < $sent){
				//Variables
				$due_date = $due - $sent;
				$days = 86400; // Day count
				//Convert to days
				$due_date = $due_date / $days;
				$pos = strpos($due_date, "."); // Days position
				$len = strlen($due_date); // Round numbers
				$trim = $pos - $len; // strip to 2 digits
				$due_date = substr($due_date, 0, $trim); // string stripped
				$due_date = str_replace("-", "", $due_date); // remove ugly slash
				$message = "<i class='text-warning h5 bi bi-exclamation-triangle'></i> Invoice <span class='text-danger'><b>". $due_date ."</b></span>Days Overdue! <i class='text-warning h5 bi bi-exclamation-triangle'></i>";
			}else{
				//Variables
				$due_date = $due - $sent;
				$days = 86400; // Day count
				//Convert to days
				$due_date = $due_date / $days;
				$pos = strpos($due_date, "."); // Days position
				$len = strlen($due_date); // Round numbers
				$trim = $pos - $len; // strip to 2 digits
				$due_date = substr($due_date, 0, $trim); // string stripped
				$message = "<span class='text-warning'><b>Invoice due in ". $due_date ."Days!</b>";
			}
			
			return $message;

		}

		public function viewNotes($uid){
			//Prepare SQL
			$sql = "SELECT * FROM db_notes WHERE uid = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid]);

			$row = $stmt->fetchAll();
			
			return $row;
		}

		public function deleteOrder($uid){
			$sql = "DELETE FROM db_orders WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid]);

			return $stmt;
		}

		public function addNote($uid, $note){
			$sql = "INSERT INTO db_notes (uid, notes) VALUES (?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid, $note]);

			return $stmt;
		}
		public function delNote($uid){
			$sql = "DELETE FROM db_notes WHERE  id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid]);

			return $stmt;
		}

	}