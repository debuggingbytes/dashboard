<?php
	class Time extends Dbh {

		public function startHourly($uid, $timestart){
			
			$sql = "INSERT INTO db_hourlyBilling (uid, start_time) VALUES (?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid, $timestart]);

			return $stmt;

		}

		public function endHourly($hid,$uid, $endtime, $note){

			$sql = "UPDATE db_hourlyBilling SET end_time = ?, note = ? WHERE hid = ? AND uid = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$endtime, $note, $hid, $uid]);
			return $stmt;

		}

		public function createInvoice($uid){

		}

		public function sendInvoice($uid){

		}
	}