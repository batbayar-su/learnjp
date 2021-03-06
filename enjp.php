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
				<li class="separator">/</li>
				<li><a href="enjp.php">EN -> JP</a></li>
				<li class="separator">/</li>
				<li><a href="addword.php">Add word</a></li>
			</ul>
			<h1 class="en-word word"><?=$init->en?></h1>
			<input type="hidden" name="action" value="enjp">
			<input type="hidden" name="id" value="<?=$init->id?>">
			<input type="text" name="jp-word" placeholder="japanese" class="value">
			<input type="button" class="ok-button button" value="OK">
			<input type="button" class="next-button button" value="Next">
			<div class="message"></div>
		</div>

	  <!-- jQuery -->
	  <script src="jquery.js"></script>
	  <!-- main js -->
	  <script src="main.js"></script>
	</body>
</html>