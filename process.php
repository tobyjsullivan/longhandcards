<?php 
require_once('stripe_config.php');
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

		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Longhand Cards</h1>
			<h5>It's like having your secretary send a card &mdash; but more personal.</h5>
			<hr />
		</div>

		<?php
		$token  = $_POST['stripeToken'];
		$charge = Stripe_Charge::create(array(
			'card'     => $token,
			'amount'   => 1000,
			'currency' => 'usd'
		));
		?>

		<div class="two-thirds column">
			<h3>Thank you for your order!</h3>
			<p>We've received your order and will write your card soon. We'll send you an email letting 
				you know when it has been dropped in the mail.</p>
		</div>
		<div class="one-third column">
			<h3>How It Works</h3>
			<p><strong>Step One:</strong> Choose a Card</p>
			<p><strong>Step Two:</strong> Personalise Your Card</p>
			<p><strong>Step Three:</strong> Pay</p>
			<p><strong>Then:</strong> We handwrite your card and mail it in time for Christmas!</p>
		</div>
		
	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>