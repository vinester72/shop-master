<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn -> connect_error) {
 	die("Connetion failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>