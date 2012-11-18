<?php
require_once('stripe/Stripe.php');

$stripe = array(
  'secret_key'      => "sk_test_k5bYr7JsouTTQK88EDntN8Pg",
  'publishable_key' => "pk_test_TsKKWJQMzpvKFjvVrTxbnSy6"
);

Stripe::setApiKey($stripe['secret_key']);
?>