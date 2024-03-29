<?php
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
	<link rel="stylesheet" href="stylesheets/greetings.css">
	<link rel="stylesheet" href="stylesheets/greeting-home.css">

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
			<h3>Step One: Choose a Card</h3>
			<?php
			$db = new Database();
			$card_res = $db->query("SELECT id, display_name, stock FROM cards ORDER BY RAND()");

			while($card_row = $card_res->fetch_assoc()) {
			?>
			<div class="row card-listing">
				<div class="four columns alpha card-preview">
					<p>
						<a href="<?= "images/card".$card_row['id']."_front_full.jpg" ?>">
							<img src="<?= "images/card".$card_row['id']."_front_200.jpg" ?>">
						</a>
					</p>
					<p><?= $card_row['display_name'] ?></p>
				</div>
				<div class="four columns omega">
					<div class="card-options">
						<p><a href="<?= "images/card".$card_row['id']."_inside_500.jpg" ?>">See Inside</a></p>
						<?php
						if($card_row['stock'] > 0) {
						?>
						<p class="buy-this-card"><a href="<?= "personalise.php?card=".$card_row['id'] ?>">Buy This Card</a></p>
						<?php
						} else {
							?>
							<p class="out-of-stock">Out of Stock</p>
							<?php
						}
						?>
					</div>
				</div>
				<div class="two columns">
					<p class="card-price">$5</p>
				</div>
			</div>
			<hr />
			<?php
			}
			$db->close();
			?>
			<p>We are always adding more cards so check back again soon!</p>
		</div>

		<?php require_once('footer.php'); ?>
		
	</div><!-- container -->


<!-- End Document
================================================== -->
<?php require_once('feedbackify.php'); ?>
</body>
</html>