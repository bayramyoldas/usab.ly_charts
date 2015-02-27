<?php
$host = "localhost";
$dbname = "usably_charts";
$dbuser = "root";
$dbpass = "";

#connect to db
try {
	$conn = new PDO ('mysql:host=$host;dbname=$dbname', $dbuser, $dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo 'ERROR': . $e->getMessage();
	
	
}


?>