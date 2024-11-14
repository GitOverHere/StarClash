<?php

//get last 50 messages at first. CLient maintains a counter 
//call this again to get next 50




$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'starclash';

$roomuuid = $_POST['roomuuid'];
$limit = $_POST['limit'];
$index = $_POST['index'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages WHERE roomuuid = $roomuuid LIMIT $index,$limit";


$query = $conn->query($sql);

$query->num_rows;



$data = {
	"httpcode": "200",
	"response_code": "listmessages",
	"content": $query->fetch_array()
};


http_respose_code(200);

header('Content-Type: application/json');

echo json_encode($data);



if(index < 0){
	
	data = {
		"httpCode": "400",
		"response_code": "invalid_index",
		"message": "Bruh you can't go below 0 in message index."
		
		
	}
	
	http_response_code(400);
	header('Content-Type: application/json');

echo json_encode($data);
	
}
