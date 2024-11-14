<?php

$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'starclash';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM rooms";


$query = $conn->query($sql);







$data = {
	"httpcode": "200",
	"response_code": "listrooms",
	"content": $query->fetch_array()
}


http_response_code(200);


header('Content-Type: application/json');

echo json_encode($data);


?>