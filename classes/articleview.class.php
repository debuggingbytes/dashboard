<?php
	/**
	 * Article View Class File
	 * Designed for view articles only
	 * Created: November 15/2021
	 * Created By: Kris Cartmell
	 * http://www.debuggingbytes.com
	 */

	 class ArticleView extends Article {

		public function Articles($order){
			$result = $this->viewAll($order);
			if($result == false){
				return false;
				exit();
			}
			return $result;
		}

		public function Article($id){
			$result = $this->view($id);
			if($result == false){
				return false;
				exit();
			}
			return $result;
		}

	 } // EOF CLASS