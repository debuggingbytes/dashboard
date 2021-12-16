<?php

    class Order extends Dbh {
        public $result;
		public $row;
        private $fullname;
        private $email;
        private $phone;
        private $message;
        private $website_type;
        private $responsive;
        private $seo;
        private $contactfunc;
        private $extraPages;
		private $totalcost;
		private $template_name;

        public function __construct($fullname, $email, $phone, $message, $package, $extra_pages, $responsive, $seo, $contactfunc, $totalcost, $template_name){

            $this->fullname = $fullname;
            $this->email = $email;
            $this->phone = $phone;
            $this->message = $message;
            $this->website_type = $package;
            $this->extraPages = $extra_pages;
            $this->responsive = $responsive;
            $this->seo = $seo;
            $this->contactFunc = $contactfunc;
			$this->totalCost = $totalcost;
			$this->template_name = $template_name;

        }

		

        public function validateEmail(){
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
                return $result;
            }else{
                $result = true;
                return $result;
            }
        }

        public function validateName(){
            if(!preg_match("/[a-zA-Z ]$/", $this->fullname )){
                $result = false;
                return $result;
            }else{
                $result = true;
                return $result;
            }
        }

        public function validatePhone(){
            if(!preg_match("/[0-9]{10}$/", $this->phone)) {
                $result = false;
                return $result;
            }else{
                $result = true;
                return $result;
            }
        }

        public function validateMessage(){
            if(!preg_match("/[a-zA-Z0-9 ]$/", $this->message)){
                $result = false;
                return $result;
            }else{
                $result = true;
                return $result;
            }
        }

        public function totalCost(){
            $total = 0;
            $total = $this->package + $this->seo + $this->responsive + $this->contactFunc;
            if($total < 400){
                $result = false;
                return $result;
            }else{
                $result = true;
                return $result;
            }
        }

		public function submitOrder(){

			// Format the Email, Convert prices to text
			$pages = "<b>Extra Pages:</b> " . $this->extraPages / 10;
			if($this->responsive <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}else{
					$responsive = "Option Declined";
				}
				
			}else{
				$responsive = "Option Accepted";
			}
			if($this->seo <= 1){
				//But was it included in the package?
				if(preg_match('/^premium/', strtolower($this->website_type))){
					$seo = "Option Included in Package";
				}else{
					$seo = "Option Declined";
				}
			}else{
				$seo = "Option Accepted";
			}
			if($this->contactFunc <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}else{
					$contact = "Option Declined";
				}
			}else{
				$contact = "Option Accepted";
			}


			$addition_info = 
			"<b>Order Details: </b><br> \n".
			$this->message;

			// Looks good? Put it in the database

			$sql = "INSERT into db_orders (full_name, email, phone, website_type, template_name, additional_info, total_cost) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);

			$stmt->execute([$this->fullname, $this->email, $this->phone, $this->website_type, $this->template_name, $addition_info, $this->totalCost]);
			return true;
			
		}
        public function SendClient(){

			$pages = $this->extraPages / 10;
			if($this->responsive <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}else{
					$responsive = "Option Declined";
				}
				
			}else{
				$responsive = "Option Accepted";
			}
			if($this->seo <= 1){
				//But was it included in the package?
				if(preg_match('/^premium/', strtolower($this->website_type))){
					$seo = "Option Included in Package";
				}else{
					$seo = "Option Declined";
				}
			}else{
				$seo = "Option Accepted";
			}
			if($this->contactFunc <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}else{
					$contact = "Option Declined";
				}
			}else{
				$contact = "Option Accepted";
			}
			
			if(!empty($this->template_name)){
				$templateInfo = "<b>Template Name: </b> ". $this->template_name ."<br />";
			}
			

			$addition_info = 
			"<b>Package Details include: </b><br> \n".
			$templateInfo ."
			<b>Extra Pages :</b> ". $pages ." pages<br> \n
			<b>Responsive added: </b>". $responsive ."<br> \n
			<b>Seo Add: </b>". $seo ."<br> \n
			<b>Contact Function: </b>". $contact ."<br /><br />
			<b>Total Cost: </b> $". $this->totalCost ."<br /><br />
			<b>Note:</b> Website development will only begin when a deposit of $". ($this->totalCost / 2) ." has been made.<br /><br />
			Current accepted payment methods are Interac E-Transfer, and Paypal.  more payment options will be added in the future";


            $headers  = "From: Order Information <noreply@debuggingbytes.com>\n";
            $headers .= "X-Sender: DebuggingBytes <noreply@debuggingbytes.com>\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $headers .= "X-Priority: 1\n"; // Urgent message!
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
            
            $message = '
            <html>
            <head>
                <title>Order</title>
                <link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
            </head>
            <body><img alt="" src="http://www.debuggingbytes.com/files/images/db-full-logo.png" style="width: 25%;" /><br />
            <br />
            Hello '. $this->fullname .'!<br />
			This email is to confirm your order for a ('.$this->website_type.') website. Please keep this email for your records<br />
            

            <br />
            Your order details are as followed <br />
            '. $addition_info .'
            &nbsp;</body>
            </html>
            ';


            mail($this->email, "DebuggingBytes - Order Information", $message, $headers);
			return true;
		
        }
		public function SendMail(){
			// Format the Email, Convert prices to text
			$pages = "Extra Pages: " . $this->extraPages / 10;
			if($this->responsive <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$responsive = "Option Included in Package";
				}else{
					$responsive = "Option Declined";
				}
				
			}else{
				$responsive = "Option Accepted";
			}
			if($this->seo <= 1){
				//But was it included in the package?
				if(preg_match('/^premium/', strtolower($this->website_type))){
					$seo = "Option Included in Package";
				}else{
					$seo = "Option Declined";
				}
			}else{
				$seo = "Option Accepted";
			}
			if($this->contactFunc <= 1){
				//But was it included in the package?
				if(preg_match('/^standard/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}elseif(preg_match('/^premium/', strtolower($this->website_type))){
					$contact = "Option Included in Package";
				}else{
					$contact = "Option Declined";
				}
			}else{
				$contact = "Option Accepted";
			}
			if(!empty($this->template_name)){
				$templateInfo = "<b>Template Name: </b> ". $this->template_name ."<br />";
			}
			

			$addition_info = 
			"<b>Order Details: </b><br> \n".
			$this->message ."<br><br> \n
			". $templateInfo ."\n
			
			<b>Extra Pages :</b>". $pages ." pages<br> \n
			<b>Responsive added: </b>". $responsive ."<br> \n
			<b>Seo Add: </b>". $seo ."<br> \n
			<b>Contact Function: </b>". $contact;

            $headers  = "From: DB Order <noreply@debuggingbytes.com>\n";
            $headers .= "X-Sender: DebuggingBytes <noreply@debuggingbytes.com>\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $headers .= "X-Priority: 1\n"; // Urgent message!
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
            
            $message = '
            <html>
            <head>
                <title>Order</title>
                <link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
            </head>
            <body><img alt="" src="http://www.debuggingbytes.com/files/images/db-full-logo.png" style="width: 25%;"/><br />
            <br />
            Full name : '. $this->fullname .'<br />
            Email :'. $this->email .'<br />
            Service : '. $this->website_type .'<br />
			Order Cost : '. $this->totalCost .'<br />

            <br />
            The following information has been provided for the order.  Please refer to the database<br />
            '. $addition_info .'
            &nbsp;</body>
            </html>
            ';


            mail("kris@debuggingbytes.com", "DB Contact Form", $message, $headers);
        }

    }