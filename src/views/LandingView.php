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
		
		$lang = "en"; // default
		if(isset($_POST["lang"])) $lang = $_POST["lang"];
		// echo "lang: $lang\n<br>";
		
		$langs = array(
			"en" => array(
				"Language" => "Language",
				"Title" => "Throw-a-Coin-in-the-Fountain",
				"Fountain1" => "Fountain One",
				"Fountain2" => "Fountain Two",
				"Fountain3" => "Fountain Three",
				"Wish Text" => "Wish Text",
				"Fountain Name" => "Fountain Name",
				"Fountain Location" => "Fountain Locatoion",
				"Fountain Number" => "Fountain Number",
				"Email Recipients" => "Email Recipients",
				"Add Another Email" => "Add Another Email",
				"Throw a Coin" => "Throw a Coin",
				"Throw {{amount}} Coin" => "Throw {{amount}} Coin"
			),
			"es" => array(
				"Language" => "Idioma",
				"Title" => "Tirar-una-Moneda-en-la-Fuente",
				"Fountain1" => "Fuente Uno",
				"Fountain2" => "Fuente Dos",
				"Fountain3" => "Fuente Tres",
				"Wish Text" => "Texto del Deseo",
				"Fountain Name" => "Nombre de Fuente",
				"Fountain Location" => "Ubicación de la Fuente",
				"Fountain Number" => "Número de Fuente",
				"Email Recipients" => "Destinatarios de Correo Electrónico",
				"Add Another Email" => "Añadir Otro Correo Electrónico",
				"Throw a Coin" => "Tirar una Moneda",
				"Throw {{amount}} Coin" => "Tirar una Moneda de {{amount}}"
			)		
		);
		
		
		$rc = putenv("LANG=$lang");
		// if(!$rc) echo "putenv failed";
		// else echo "putenv: ".$rc;
		// echo "\n<br>";
		
		$rc = setlocale(LC_ALL, $lang);
		// if(!$rc) echo "setlocale failed";
		// else echo "setLocale: ".$rc;
		// echo "\n<br>";
		
		// Set the text domain as 'messages'
		$domain = "messages";
		$rc = bindtextdomain($domain, "./src/locale"); 
		// if(!$rc) echo "bindtextdomain failed";
		// else echo "bindtextdomain: ".$rc;
		// echo "\n<br>";
		
		$rc = textdomain($domain);
		// if(!$rc) echo "textdomain failed";
		// else echo "text domain: ".$rc;
		// echo "\n<br>";
		
		$NumEmails = 1;
		if(isset($_POST["NumEmails"])) $NumEmails = intval($_POST["NumEmails"]);
		if(isset($_POST["removeEmail"]) and $NumEmails != 1) $NumEmails--;
		else if(isset($_POST["addEmail"])) $NumEmails++;
		
		?>
		<!DOCTYPE html>
		<html>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<head>
				<link rel="stylesheet" media="all" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				<form id="main" name="main" method="POST">
					<label for="lang"><?php echo $langs[$lang]["Language"].":";?></label>
					<select id="lang" name="lang" onchange="this.form.submit()">
						<option value="en" <?php if($lang == "en") echo "selected";?>>English</option>
						<option value="es" <?php if($lang == "es") echo "selected";?>>Espa&ntildeol</option>
					</select>
				</form>
				
				<?php
					if(isset($_POST["lang"])){
						?>
						<h1 style="color:RED;">Gettext is literally cancer</h1>
						<?php
					}
				?>
				<h1><?php echo $langs[$lang]["Title"];?></h1>
				
				<div class="slideshow-container">

					<div class="mySlides fade">
					  <div class="numbertext">1 / 3</div>
					  <img src="src/resources/fountain_1.jpg" style="width:100%">
					  <div class="text"><?php echo $langs[$lang]["Fountain1"];?></div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 3</div>
					  <img src="src/resources/fountain_2.jpg" style="width:100%">
					  <div class="text"><?php echo $langs[$lang]["Fountain2"];?></div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 3</div>
					  <img src="src/resources/fountain_3.jpg" style="width:100%">
					  <div class="text"><?php echo $langs[$lang]["Fountain3"];?></div>
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
					  	<?php $fN = 1; $fountainImg = "src/resources/fountain_$fN.jpg"; echo $fountainImg;?>
					  }
					  if(n == 2){
					  	<?php $fN = 2; $fountainImg = "src/resources/fountain_$fN.jpg"; echo $fountainImg;?>
					  }
					  if(n == 3){
					  	<?php $fN = 3; $fountainImg = "src/resources/fountain_$fN.jpg"; echo $fountainImg;?>
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
				
				<div style="text-align: center;">
					<span><?php echo $langs[$lang]["Wish Text"];?></span><br>
					<textarea form="payButton" name="wishText" rows="15" cols="120" required></textarea><br>
					
					<span><?php echo $langs[$lang]["Fountain Name"];?></span><br>
					<textarea form="payButton" name="fountainName" rows="1" cols="50" required></textarea><br>
					
					<span><?php echo $langs[$lang]["Fountain Location"];?></span><br>
					<textarea form="payButton" name="fountainLocation" rows="1" cols="50" required></textarea><br>
					
					<span><?php echo $langs[$lang]["Fountain Number"];?></span><br>
					<input type="number" form="payButton" name="fountainNum" rows="1" cols="50" required></textarea><br>
						
					<div style="display: inline-block; position: relative; right: -15px;">
						<?php echo $langs[$lang]["Email Recipients"];?>
						<?php 
							for($i = 1; $i <= $NumEmails; $i++){
								echo "<br><input form=\"payButton\" type=\"text\" name=\"emails[$i]\">";
							}
						?>
					</div>
					<input type="submit" form="emailAddSub" name="removeEmail" value="X" style="position:relative; right: -15px;"><br>
					<form id="emailAddSub" method="POST">
						<input type="submit" name="addEmail" value="<?php echo $langs[$lang]["Add Another Email"];?>"><br>
						<input type="hidden" name="NumEmails" value="<?php echo $NumEmails;?>">
						<input type="hidden" name="lang" value="<?php echo $lang;?>">
					</form>
					<br>
					<form method="post" id="payButton">
						<script src="https://checkout.stripe.com/checkout.js" 
							class="stripe-button"
							data-key="<?php echo $stripe['publishable_key']; ?>"
							data-name="<?php echo $langs[$lang]["Throw a Coin"];?>"
							data-image="https://upload.wikimedia.org/wikipedia/commons/5/5e/Assorted_United_States_coins.jpg"
							data-locale="auto"
							data-amount="50"
							data-label="<?php echo $langs[$lang]["Throw a Coin"];?>"
							data-panel-label="<?php echo $langs[$lang]["Throw {{amount}} Coin"];?>"
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