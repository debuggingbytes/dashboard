<?php
	class lastOrders extends Dbh {

		public function PullOrders(){
			$sql = "SELECT * FROM db_orders ORDER BY id DESC LIMIT 3";
			$stmt = $this->connect()->query($sql);
			$stmt->execute();

			$row = $stmt->fetchAll();

			return $row;
		}

		public function totalOrders(){
			$sql = "SELECT * FROM db_orders";
			$stmt = $this->connect()->query($sql);
			$stmt->execute();
			
			$row = $stmt->fetchAll();
			return $row;
		}

	}