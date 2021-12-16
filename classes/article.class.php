<?php
	/**
	 * Article Class File
	 * Designed to handle database queries with articles
	 * Created: November 15/2021
	 * Created By: Kris Cartmell
	 * http://www.debuggingbytes.com
	 */

	 class Article extends Dbh{

		protected function AddArticle ($title, $content, $author){

			// Insert article into database
			$sql = "INSERT INTO db_cms_articles (title, content, author) VALUES (?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			if($stmt->execute([$title, $content, $author])){
				return true;
			}else{
				return false;
			}
		}

		protected function DelArticle($id){
			$sql = "DELETE FROM db_cms_articles WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			if($stmt->execute([$id])){
				return true;
			}else{
				return false;
			}
		}
		protected function EditArticle($id, $title, $content, $author){
			$sql = "UPDATE db_cms_articles SET title = ?, content = ?, author = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			if($stmt->execute([$title, $content, $author, $id])){
				return true;
			}else{
				return false;
			}

		}

		protected function ViewAll($order){
			$sql = "SELECT * FROM db_cms_articles ORDER BY id $order";
			$stmt = $this->connect()->query($sql);
			
			if($stmt->rowCount() == 0){
				return false;
				exit();
			}
			$row = $stmt->fetchAll();
			return $row;

		}
		protected function View($id){
			$sql = "SELECT * FROM db_cms_articles WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$id]);

			if($stmt->rowCount() == 0){
				return false;
				exit();
			}
			$row = $stmt->fetchAll();
			return $row;

		}

	 }