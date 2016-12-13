<?php
namespace roommates\hw5\controllers;
require_once 'vendor/autoload.php';#("./src/views/LandingView.php");
use roommates\hw5 as A;


/**
* Controls the way in which the landing page is rendered 
*
*/
class LandingController implements controller{


	public function __construct(){}
	/**
	* Creates a LandingView object and has it render the landing page
	*
	* @return null
	*/
	function processRequest(){
		$view = new A\views\LandingView();
		$view->render(null);
	}
}