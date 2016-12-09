<?php

require_once("./src/views/LandingView.php");


/**
* Controlls the way in which the landing page is rendered 
*
*/
class LandingController {

	/**
	* Creats a LandingView object and has it render the landing page
	*
	* @return null
	*/
	function processRequest(){
		$lV = new LandingView();
		$lV->render(null);
	}
}