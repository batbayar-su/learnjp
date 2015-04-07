<?php
require 'db.php';
$init = getInit();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  	<link rel="stylesheet" href="style.css">
		<title>Learn Japanese</title>
	</head>
	<body>
		<div class="container">
			<div class="counter"><span class="correct">0</span> / <span class="total"><?= getTotal()?></span></div>
			<ul class="top-navigation">
				<li><a href="jpen.php">JP -> EN</a></li>
				<li class="separator">|</li>
				<li><a href="enjp.php">EN -> JP</a></li>
				<li class="separator">|</li>
				<li><a href="addword.php">Add word</a></li>
			</ul>
			<h1 class="jp-word word"><?=$init->jp?></h1>
			<input type="hidden" name="action" value="jpen">
			<input type="hidden" name="id" value="<?=$init->id?>">
			<input type="text" name="en-word" placeholder="latin" class="value">
			<input type="button" value="OK" class="ok-button button">
			<input type="button" class="next-button button" value="Next">
			<div class="message"></div>
		</div>

	  <!-- jQuery -->
	  <script src="jquery.js"></script>
	  <!-- main js -->
	  <script src="main.js"></script>
	</body>
</html>