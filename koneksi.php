<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "ksp";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
?>