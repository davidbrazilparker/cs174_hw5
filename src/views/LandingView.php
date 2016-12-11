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
				<style>
					* {box-sizing:border-box}
					body {font-family: Verdana,sans-serif;margin:0}
					.mySlides {display:none}

					/* Slideshow container */
					.slideshow-container {
					  max-width: 1000px;
					  position: relative;
					  margin: auto;
					}

					/* Next & previous buttons */
					.prev, .next {
					  cursor: pointer;
					  position: absolute;
					  top: 50%;
					  width: auto;
					  padding: 16px;
					  margin-top: -22px;
					  color: white;
					  font-weight: bold;
					  font-size: 18px;
					  transition: 0.6s ease;
					  border-radius: 0 3px 3px 0;
					}

					/* Position the "next button" to the right */
					.next {
					  right: 0;
					  border-radius: 3px 0 0 3px;
					}

					/* On hover, add a black background color with a little bit see-through */
					.prev:hover, .next:hover {
					  background-color: rgba(0,0,0,0.8);
					}

					/* Caption text */
					.text {
					  color: #f2f2f2;
					  font-size: 15px;
					  padding: 8px 12px;
					  position: absolute;
					  bottom: 8px;
					  width: 100%;
					  text-align: center;
					}

					/* Number text (1/3 etc) */
					.numbertext {
					  color: #f2f2f2;
					  font-size: 12px;
					  padding: 8px 12px;
					  position: absolute;
					  top: 0;
					}

					/* The dots/bullets/indicators */
					.dot {
					  cursor:pointer;
					  height: 13px;
					  width: 13px;
					  margin: 0 2px;
					  background-color: #bbb;
					  border-radius: 50%;
					  display: inline-block;
					  transition: background-color 0.6s ease;
					}

					.active, .dot:hover {
					  background-color: #717171;
					}

					/* Fading animation */
					.fade {
					  -webkit-animation-name: fade;
					  -webkit-animation-duration: 1.5s;
					  animation-name: fade;
					  animation-duration: 1.5s;
					}

					@-webkit-keyframes fade {
					  from {opacity: .4} 
					  to {opacity: 1}
					}

					@keyframes fade {
					  from {opacity: .4} 
					  to {opacity: 1}
					}

					/* On smaller screens, decrease text size */
					@media only screen and (max-width: 300px) {
					  .prev, .next,.text {font-size: 11px}
					}
				</style>
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
				<div></div>
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