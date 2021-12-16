<?php
	/**
	 * Article Controller Class File
	 * Designed for send queries to database
	 * Created: November 15/2021
	 * Created By: Kris Cartmell
	 * http://www.debuggingbytes.com
	 */

	 class ArticleContr extends Article {

		public function Insert($title, $content, $author){
			$result = $this->AddArticle($title, $content, $author);
			if($result == true){
				return true;
			}else{
				return false;
			}
		}

		public function Delete($id){
			$result = $this->DelArticle($id);
			if($result == true){
				return true;
			}else{
				return false;
			}
		}
		public function Edit($id, $title, $content, $author){
			$result = $this->EditArticle($id, $title, $content, $author);
			if($result == true){
				return true;
			}else{
				return false;
			}
		}

	 } // EOF CLASS