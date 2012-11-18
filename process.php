<?php 
require_once('stripe_config.php');
require_once('Order.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Personal Christmas Cards - LonghandCards.com</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/greeting-personalise.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">

		<?php require_once('header.php'); ?>

		<?php
		$order = new Order();
		$order->setMessage($_POST['message']);
		$order->setWriter($_POST['writer']);
		$order->setSenderName($_POST['sender-name']);
		$order->setSenderEmail($_POST['sender-email']);
		$order->setRecipientName($_POST['recipient-name']);
		$order->setRecipientAddress($_POST['recipient-address']);
		$order->setRecipientAddress2($_POST['recipient-address2']);
		$order->setRecipientCity($_POST['recipient-city']);
		$order->setRecipientPostal($_POST['recipient-postal']);
		$order->setRecipientProvince($_POST['recipient-province']);
		$order->setRecipientCountry($_POST['recipient-country']);

		$token  = $_POST['stripeToken'];
		$charge = Stripe_Charge::create(array(
			'card'     => $token,
			'amount'   => 1000,
			'currency' => 'usd'
		));

		$order->setStripePayment($charge["id"]);

		$order->save();

		$order_id = "LHC050-".$order->getOrderId();
		?>

		<div class="two-thirds column">
			<h3>Thank you for your order!</h3>
			<p>Your order number is <strong><?= $order_id ?></strong>. Please keep 
				this for your records.</p>
			<p>We've received your order and will write your card soon. We'll send you an email letting 
				you know when it has been dropped in the mail.</p>
			<p>If you have any questions or concerns about your order, please get in touch at 
				<a href="mailto:contact@longhandcards.com">contact@longhandcards.com</a></p>
		</div>

		<?php require_once('footer.php'); ?>
		
	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>