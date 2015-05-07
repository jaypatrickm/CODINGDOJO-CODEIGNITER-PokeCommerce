<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_cq3viBdR4UcNyo4acVyk0u1L",
  "publishable_key" => "pk_test_tAa4asVHn9WlRlN4NfRTu8AC"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>