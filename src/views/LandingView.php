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
		// composer hates global variables
		$stripe = array(
		  "secret_key"      => "sk_test_BsMjVbSw0xLVRg4q9kQQvR6w",
		  "publishable_key" => "pk_test_5mgPuSlosQhka2t9cm07sYTC"
		);
		\Stripe\Stripe::setApiKey($stripe['secret_key']);
		
		$lang = "es"; // default
		if(isset($_POST["lang"])) $lang = $_POST["lang"];
		echo "lang: $lang\n<br>";
		
		$rc = putenv("LANG=$lang");
		if(!$rc) echo "putenv failed";
		else echo "putenv: ".$rc;
		echo "\n<br>";
		
		$rc = setlocale(LC_ALL, $lang);
		if(!$rc) echo "setlocale failed";
		else echo "setLocale: ".$rc;
		echo "\n<br>";
		
		// Set the text domain as 'messages'
		$domain = "messages";
		$rc = bindtextdomain($domain, "./src/locale"); 
		if(!$rc) echo "bindtextdomain failed";
		else echo "bindtextdomain: ".$rc;
		echo "\n<br>";
		
		$rc = textdomain($domain);
		if(!$rc) echo "textdomain failed";
		else echo "text domain: ".$rc;
		echo "\n<br>";
		
		?>
		<!DOCTYPE html>
		<html>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<head>
				<link rel="stylesheet" media="all" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				<form id="main" name="main" method="POST">
					<label for="lang"><?php echo _("Language").":";?></label>
					<select id="lang" name="lang" onchange="this.form.submit()">
						<option value="en" <?php if($lang == "en") echo "selected";?>>English</option>
						<option value="es" <?php if($lang == "es") echo "selected";?>>Espa&ntildeol</option>
					</select>
				</form>
				
				<h1><?php echo _("Site Title");?></h1>
				
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
					  if(n == 1){
					  	<?php $fountainImg = "src/resources/fountain_1.jpg"; echo $fountainImg;?>
					  }
					  if(n == 2){
					  	<?php $fountainImg = "src/resources/fountain_2.jpg"; echo $fountainImg;?>
					  }
					  if(n == 3){
					  	<?php $fountainImg = "src/resources/fountain_3.jpg"; echo $fountainImg;?>
					  }
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
				
				<br>
				<br>
				
				<div align="CENTER">
					<form method="post">
						<script src="https://checkout.stripe.com/checkout.js" 
							class="stripe-button"
							data-key="<?php echo $stripe['publishable_key']; ?>"
							data-name="Throw a coin"
							data-image="https://upload.wikimedia.org/wikipedia/commons/5/5e/Assorted_United_States_coins.jpg"
							data-locale="auto"
							data-amount="50"
							data-label="Throw-a-Coin"
							data-panel-label="Throw {{amount}} Coin"
							>
						</script>
					</form>
				</div>
				
				
				<div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
			</body>
		</html>		
		<?php
	}
	
}