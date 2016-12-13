<?php

namespace roommates\hw5;
session_start();

require_once 'vendor/autoload.php';
define("NS_BASE", "roommates\\hw5\\");

define(NS_BASE . "NS_CONTROLLERS", "roommates\\hw5\\controllers\\");

if(isSet($_POST['stripeToken']) or isSet($_GET['hash'])){
	$controller_class = "ChargeController";
}
else{
	$controller_class = "LandingController";
}

$controller_name = NS_CONTROLLERS . $controller_class;
$controller = new $controller_name();
$controller->processRequest();

