<?php

namespace roommates\hw5\views;
require_once 'vendor/autoload.php';

/**
* This class renders the landing page to the website. 
*/
class LandingView implements view{
	/**
	* This function spits out the html for the landing page of the website
	*
	* @param array $data Relational array holding any runtime infomation needed to render the page
	* @return null
	*/
	function render($data){
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				<label for="language" value="Language">
				<select id="language">
					<option value="English">English</option>
				</select>
				<h1>Throw-a-Coin-in-the-Fountain</h1>
				
				
			</body>
		</html>		
		<?php
	}
	
}