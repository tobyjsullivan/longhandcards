<?php 
require_once('stripe_config.php');
require_once('Database.php');
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

		<div class="two-thirds column">
			<h3>Step Two: Personalise Your Card</h3>
			<p>
				<img class="inside-preview" src="images/card<?= $_GET['card'] ?>_inside_280.jpg" />
			</p>
			<form method="post" action="process.php">
				<input type="hidden" name="card" value="<?= $_GET['card'] ?>" id="card" />
				<label for="message">Write a message</label>
				<textarea name="message" id="message">Dear friend,

May you have a very merry Christmas!</textarea>
				<?php
				/*
				?>
				<fieldset>
					<label for="">Choose a writer</label>
					<?php
					$db = new Database();
					$writer_res = $db->query("SELECT id, name, display_name FROM writers ORDER BY id ASC");

					$checked = "checked=\"checked\"";
					while($writer_row = $writer_res->fetch_assoc()) {
						?>
						<label for="writer-<?= $writer_row['name'] ?>"><input type="radio" id="writer-<?= $writer_row['name'] ?>" name="writer" value="<?= $writer_row['id'] ?>" <?= $checked ?> /><?= $writer_row['display_name'] ?></label>
						<?php 
						if($checked != "") {
							$checked = "";
						}
					}

					$db->close();
					?>
				</fieldset>
				<?php
				*/
				// Writer selection temporarily disabled
				?>
				<input type="hidden" id="writer" name="writer" value="02" />
				<?php
				?>

				<fieldset>
					<label for="">Recipient (Who is the card for?)</label>
					
					<label for="recipient-name">Name</label>
					<input type="text" id="recipient-name" name="recipient-name" />
					
					<label for="recipient-address">Address</label>
					<input type="text" id="recipient-address" name="recipient-address" />
					
					<label for="recipient-address2">Address (Line 2)</label>
					<input type="text" id="recipient-address2" name="recipient-address2" />
					
					<label for="recipient-city">City</label>
					<input type="text" id="recipient-city" name="recipient-city" />
					
					<label for="recipient-province">State/Province</label>
					<input type="text" id="recipient-province" name="recipient-province" />

					<label for="recipient-postal">Postal/Zip Code</label>
					<input type="text" id="recipient-postal" name="recipient-postal" />
					
					<label for="recipient-country">Country</label>
					<select id="recipient-country" name="recipient-country">
						<option value="canada">Canada</option>
						<option value="united-states" selected="selected">United States</option>
					</select>
				</fieldset>

				<fieldset>
					<label for="">Your information</label>
					<label for="sender-name">Full Name</label>
					<input type="text" id="sender-name" name="sender-name" />
					<label for="sender-email">Email</label>
					<input type="email" id="sender-email" name="sender-email" />
				</fieldset>
				
				<h3>Step Three: Pay</h3>
				<script src="https://button.stripe.com/v1/button.js" class="stripe-button"
				data-key="<?= $stripe['publishable_key'] ?>"
				data-amount="500"
				data-label="Pay Now"
				></script>
			</form>
		</div>

		<?php require_once('footer.php'); ?>
		
	</div><!-- container -->


<!-- End Document
================================================== -->
<?php require_once('feedbackify.php'); ?>
</body>
</html>