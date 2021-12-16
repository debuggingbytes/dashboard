<?php

    class Contact {

        public $result;
        private $first_name;
        private $last_name;
        private $email;
        private $service;
        private $message;
        private $botcheck;

        public function __construct($first_name, $last_name, $email, $service, $message, $bot_check){
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->service = $service;
            $this->message = $message;
            $this->bot_check = $bot_check;
        }
        public function ValidateEmail(){
            
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = true;
                return $result;
            }else{
                $result = false;
                #echo $result;
                return $result;
            }
            
        }
        
        public function ValidateData(){


            if(!preg_match("/^[a-zA-Z]*$/", $this->first_name)){
                $result = true;
                return $result;
            }elseif(!preg_match("/^[a-zA-Z]*$/", $this->last_name)){
                $result = true;
                return $result;
            }elseif(!preg_match("/^[a-zA-Z]*$/", $this->message)){
                $result = true;
                return $result;
            }else{
                $result = false;
                return $result;
            }
        }

        public function BotCheck(){
            if(!empty($this->bot_check)){
                return true;
            }
        }

        public function SendMail(){
            $headers  = "From: DB Robot <noreply@debuggingbytes.com>\n";
            $headers .= "X-Sender: DebuggingBytes <noreply@debuggingbytes.com>\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $headers .= "X-Priority: 1\n"; // Urgent message!
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
            
            $message = '
            <html>
            <head>
                <title>Contact</title>
                <link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
            </head>
            <body><img alt="" src="http://www.debuggingbytes.com/files/images/db-full-logo.png" /><br />
            <br />
            Full name : '. $this->first_name .'<br />
            Last name : '. $this->last_name .'<br />
            Email :'. $this->email .'<br />
            Service : '. $this->service .'<br />
            <br />
            Would like to find out more information sent from our contact page, they left the following message<br />
            '. $this->message .'
            &nbsp;</body>
            </html>
            ';


            mail("kris@debuggingbytes.com", "DB Contact Form", $message, $headers);
        }
    }