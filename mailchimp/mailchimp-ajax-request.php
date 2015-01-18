<?php 

		/*----------------------------------------------------------------
		| mailchimp-ajax-request.php
		|----------------------------------------------------------------
		|
		| This file will make a request to mail chimp to add a user to a 
		| mailing list.
		|
		| Request must be made via ajax.
		| 
		|
		*/


   		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

   			//Require Mail Chimp Php Class
   			require_once('includes/MailChimp.php');
   			//Setup class with api key
   			$MailChimp = new \Drewm\MailChimp('99ab019df158d9e4a3c867db7a94997e-us10');

   			//Get User Input
   			$UserInput = $_POST["newsletter_signup"];


   			//Process User Input
   			$UserInput = filter_var($UserInput, FILTER_SANITIZE_EMAIL);

   			// var_dump($UserInput);
   			$ArrEmail = array('email' => $UserInput);


   			$SubscribeArray = array(

                'id'                => '3377d9fe83', //Mailchimp list id...
                'email'             => $ArrEmail,
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
            );

   			
   			$result = $MailChimp->call('lists/subscribe', $SubscribeArray );

   			echo json_encode($result);
			


    	}




?>