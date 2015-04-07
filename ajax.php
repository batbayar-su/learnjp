<?php
require 'db.php';
$db = getDB();
if(isset($_POST['action'])) {
	if($_POST['action'] == 'new') {
		$jp = $_POST['jp'];
		$en = $_POST['en'];

		$result = $db->query("INSERT INTO dictionary VALUES(null, '$jp', '$en')");
		if($result) {
			print 'success';
		} else {
			print 'Error ' . $db->error;
		}
	} else if($_POST['action'] == 'delete') {
		$id = $_POST['id'];

		$result = $db->query("DELETE FROM dictionary WHERE id = $id");
		if($result) {
			print 'success';
		} else {
			print 'Error ' . $db->error;
		}
	} else if($_POST['action'] == 'jpen' || $_POST['action'] == 'enjp') {
		$jp = $_POST['jp'];
		$en = $_POST['en'];

		$count = $db->query("SELECT count(1) as count FROM dictionary WHERE jp = '$jp' and en = '$en'")->fetch_object()->count;
		if($count >= 1) {
			print 'success';
		} else {
			print 'Incorrect input. Try again.';
		}
	} else if($_POST['action'] == 'get_data') {
		$ids = $_POST['ids'];
		$result = '';
		do {
			$result = $db->query("SELECT r1.* FROM dictionary AS r1 JOIN (SELECT CEIL(RAND() * (SELECT MAX(id) FROM dictionary)) AS id) AS r2 WHERE r1.id >= r2.id AND r1.id NOT IN ($ids) and enabled = 1 ORDER BY r1.id ASC LIMIT 1;")->fetch_object();
		} while(!$result);
		print $result->jp . "::" . $result->en . "::" . $result->id;
	} else {
		die('Error');
	}
} else {
	die('Error');
}
?>