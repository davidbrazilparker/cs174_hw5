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
		
		if( ! isset($_GET["hash"])){
			//send emails
			$subject = "It totally worked";
			$message = $_POST['wishText'];
			$headers = 'From: Wish@Fountain.com';
			
			$to = $_POST['stripeEmail'];
			mail($to, $subject, $message, $headers);
			
			foreach ($_POST['emails'] as $value){
				$to = $value;
				mail($to, $subject, $message, $headers);
			}
			
			$stripe = array(
			  "secret_key"      => "sk_test_BsMjVbSw0xLVRg4q9kQQvR6w",
			  "publishable_key" => "pk_test_5mgPuSlosQhka2t9cm07sYTC"
			);
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			$token  = $_POST['stripeToken'];

			$customer = \Stripe\Customer::create(array(
				'email'   => 'customer@example.com',
				'source'  => $token
			));

			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => 50,
				'currency' => 'usd'
			));
			
			$mysql = new \roommates\hw5\models\Model();
			
			$UserName = $_POST['stripeEmail'];
			$fountainNum = $_POST['fountainNum'];
			$wish = $_POST['wishText'];
			$md5 = md5($UserName . $fountainNum . $wish);
			$mysql->insert($md5, $UserName, $fountainNum, $wish);
			$mysql->closeConn();
			
			header("Location: ". "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/?hash=$md5" ."");
		}
		else{
			$view = new A\views\ChargeView();
			$view->render($_GET);
		}
		
	}
}