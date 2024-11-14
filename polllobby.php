<?php

$host = $_ENV['starclash-host'];
$username = $_ENV['starclash-username'];
$password = $_ENV['starclash-password'];
$database = $_ENV['starclash-database'];


$room = $_GET['room'];

$mysqli = new mysqli($host,$username,$password,$database);

// Check connection
if ($mysqli -> connect_errno) {
	$message = ['http_code' => '500', 'message' => "Failed to connect to MySQL: " . $mysqli->connect_error];
  
  exit();
}

header('Content-type: application/json');
echo json_encode($message);








