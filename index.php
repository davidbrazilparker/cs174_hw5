<?php

require_once("src/controllers/LandingController.php");

/* if ($something_or_other) {*/
$lC = new LandingController();
$lC->processRequest();