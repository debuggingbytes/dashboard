<?php

	// Database Connection Class

	class Dbh {
		
		private $host = "lachley.barrowsgoldeneye.dreamhost.com";
		private $user = "debuggingbytes";
		private $pwd = "Shantell87";
		private $dbName = "debuggingbytes";

		protected function connect(){
			
			$dsn = 'mysql:host=' . $this->host .'; dbname='. $this->dbName;
			$pdo = new PDO($dsn, $this->user, $this->pwd);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			
			try {
				$connection = $pdo = new PDO($dsn, $this->user, $this->pwd);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			}catch(PDOException $e)
			{
			  echo $e->getMessage();                         
			}
			return $pdo;
		}
	}