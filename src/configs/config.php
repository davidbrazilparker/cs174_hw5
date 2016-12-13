<?php
namespace roommates\hw5\configs;
require_once('./vendor/autoload.php');

$GLOBALS['stripe'] = array(
  "secret_key"      => "sk_test_BsMjVbSw0xLVRg4q9kQQvR6w",
  "publishable_key" => "pk_test_5mgPuSlosQhka2t9cm07sYTC"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);