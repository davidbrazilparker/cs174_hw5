<?php

namespace roommates\hw5;
session_start();

require_once 'vendor/autoload.php';
define("NS_BASE", "roommates\\hw5\\");

define(NS_BASE . "NS_CONTROLLERS", "roommates\\hw5\\controllers\\");

$controller_name = NS_CONTROLLERS . "LandingController";
/* if ($something_or_other) {*/
$lC = new $controller_name();
$lC->processRequest();
