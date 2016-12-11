<?php

namespace roommates\hw5\views;
require_once 'vendor/autoload.php';

use roommates\hw5\resources as A;

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
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<head>
				<link rel="stylesheet" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				<label for="language" value="Language">
				<select id="language">
					<option value="English">English</option>
				</select>
				<h1>Throw-a-Coin-in-the-Fountain</h1>
				
				<div class="slideshow-container">

				<div class="mySlides fade">
				  <div class="numbertext">1 / 3</div>
				  <img src="src/resources/fountain_1.jpg" style="width:100%">
				  <div class="text">Fountain One</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">2 / 3</div>
				  <img src="src/resources/fountain_2.jpg" style="width:100%">
				  <div class="text">Fountain Two</div>
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">3 / 3</div>
				  <img src="src/resources/fountain_3.jpg" style="width:100%">
				  <div class="text">Fountain Three</div>
				</div>

				<a class="prev" onclick="plusSlides(-1)">❮</a>
				<a class="next" onclick="plusSlides(1)">❯</a>

				</div>
				<br>

				<div style="text-align:center">
				  <span class="dot" onclick="currentSlide(1)"></span> 
				  <span class="dot" onclick="currentSlide(2)"></span> 
				  <span class="dot" onclick="currentSlide(3)"></span> 
				</div>
				<script>
					var slideIndex = 1;
					showSlides(slideIndex);

					function plusSlides(n) {
					  showSlides(slideIndex += n);
					}

					function currentSlide(n) {
					  showSlides(slideIndex = n);
					}

					function showSlides(n) {
					  var i;
					  var slides = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("dot");
					  if (n > slides.length) {slideIndex = 1}    
					  if (n < 1) {slideIndex = slides.length}
					  for (i = 0; i < slides.length; i++) {
					      slides[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
					      dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " active";
					}
				</script>
			</body>
		</html>		
		<?php
	}
	
}