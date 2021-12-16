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

	 class UserView extends User {

		public function showUser($uid){

			$row = $this->getUser($uid);
			return $row;
			
		}

		public function something(){
			
		}

		
		 
	 }