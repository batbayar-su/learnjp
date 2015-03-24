<?php
require 'db.php';
$db = getDB();
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
			<ul class="top-navigation">
				<li><a href="jpen.php">JP -> EN</a></li>
				<li class="separator">/</li>
				<li><a href="enjp.php">EN -> JP</a></li>
				<li class="separator">/</li>
				<li><a href="addword.php">Add word</a></li>
			</ul>
			<table class="word-list">
				<?php 
				$rs = $db->query('SELECT * FROM dictionary');
				while($row = $rs->fetch_object()) { ?>
				<tr>
					<td class="jp-word"><?=$row->jp?></td>
					<td><?=$row->en?></td>
					<td>
						<input type="hidden" name="id" value="<?=$row->id?>">
						<input type="button" value="Delete" class="delete-button button">
					</td>
				</tr>
				<?php } ?>
			</table>
			<input type="text" name="jp-word" placeholder="japanese" class="jp-word">
			<input type="text" name="en-word" placeholder="latin" class="en-word">
			<input type="button" value="Add" class="add-button button">
			<div class="message"></div>
		</div>

	  <!-- jQuery -->
	  <script src="jquery.js"></script>
	  <!-- main js -->
	  <script src="main.js"></script>
	</body>
</html>