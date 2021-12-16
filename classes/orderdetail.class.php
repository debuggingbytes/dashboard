<?php

	class OrderDetail extends dbh {
		public function getOrderDetails($orderName){
			//Prepare SQL
			$sql = "SELECT * FROM template_information WHERE name = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$orderName]);

			$row = $stmt->fetch();
			
			return $row;
							
		}
	}