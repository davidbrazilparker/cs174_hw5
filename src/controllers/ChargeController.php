<?php
namespace roommates\hw5\controllers;
require_once 'vendor/autoload.php';#("./src/views/LandingView.php");
use roommates\hw5 as A;


/**
* Controls the way in which the landing page is rendered 
*
*/
class ChargeController implements controller{


	public function __construct(){}
	/**
	* Send the respective emails and creates a ChargeView object and has it render the landing page
	*
	* @return null
	*/
	function processRequest(){
		
		//send emails
		$subject = "It totally worked";
		$message = $_POST['wishText'];
		$headers = 'From: Wish@Fountain.com';
		foreach ($_POST['emails'] as $value){
			$to = $value;
			mail($to, $subject, $message, $headers);
		}
		
		$view = new A\views\ChargeView();
		$view->render(null);
	}
}