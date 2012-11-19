<?php
require_once('debug_config.php');

if($debug == 0) {
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36415481-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php
}
?>

<div class="two-thirds column">
	<h1 class="remove-bottom" style="margin-top: 40px">Personal Christmas Cards</h1>
	<p><em>Presented by LonghandCards.com</em></p>
	<h5>It's like having your secretary send a card &mdash; but more personal.</h5>
	<hr />
</div>

<div class="one-third column">
  <div class="christmas-countdown">
    <?php
    $deadline = 1354492800; // Dec. 3rd, 2012
    $rem = $deadline - time();

    if($rem > 0) {
      $days = floor($rem / (60 * 60 * 24));

      ?>
      <p>Only <?= $days ?> days left to mail your cards in time for Christmas!</p>
      <?php
    } else {
      die("Personal Christmas Cards is closed. The deadline for mailing cards has passed.");
    }
    ?>
  </div>
</div>