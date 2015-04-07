<?php
function getDB() {
	$server = 'localhost';
	$username = 'root';
	$password = '123';
	$database = 'learnjp_db';

	$connection = mysqli_connect($server, $username, $password, $database);
	if (mysqli_connect_errno()) {
	   die("DB Connection failed: " . mysqli_connect_error());
	}

	$connection->query("SET NAMES 'utf8'");

	return $connection;
}

function getInit() {
	$db = getDB();
	$result = $db->query("SELECT r1.* FROM dictionary AS r1 JOIN (SELECT CEIL(RAND() * (SELECT MAX(id) FROM dictionary)) AS id) AS r2 WHERE r1.id >= r2.id ORDER BY r1.id ASC LIMIT 1;")->fetch_object();
	return $result;
}

function getTotal() {
	$db = getDB();
	$count = $db->query("SELECT count(1) as count FROM dictionary WHERE enabled = 1")->fetch_object()->count;
	return $count;
}
?>