<?php
require_once('debug_config.php');
require_once('stripe/Stripe.php');

if($debug >= 1) {
	$stripe = array(
	  'secret_key'      => "sk_test_k5bYr7JsouTTQK88EDntN8Pg",
	  'publishable_key' => "pk_test_TsKKWJQMzpvKFjvVrTxbnSy6"
	);
} else {
	$stripe = array(
	  'secret_key'      => "sk_live_bqq3vFhzlKb4OL4ktfM5BV9k",
	  'publishable_key' => "pk_live_RjztYyQW0AdwVKN1oGPB2bXV"
	);
}

Stripe::setApiKey($stripe['secret_key']);
?>