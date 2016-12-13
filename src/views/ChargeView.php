<?php

namespace roommates\hw5\views;
require_once 'vendor/autoload.php';

use roommates\hw5\resources as A;

/**
* This class renders the landing page to the website. 
*/
class ChargeView implements view{
	/**
	* This function spits out the html for the landing page of the website
	*
	* @param array $data Relational array holding any runtime infomation needed to render the page
	* @return null
	*/
	function render($data){
		// composer hates global variables
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

		/*href to $_GET URL created from $_POST data*/
		
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				Payment successfully charged
				<br>
				<h1>Check out this cool PDF of your wish</h1>
			</body>
		</html>		
		<?php 
		
	}
	
}