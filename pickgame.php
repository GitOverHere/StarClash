<?php

//Request a minigame from the server.


$token = $_POST['token'];
$opponent = $_POST['opponent'];

//Insert a message which is essentially a command that triggers a 
// duel accept dialog. The player can accept or deny the duel. If the 
// incoming duel is denied the previous player gives up the square.

$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'starclash';
$x = $_POST['x'];
$y = $_POST['y'];




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM tokens where token=$token";


$query = $conn->query($sql);
if($query->num_rows == 1){
	
	$gameindex = rand(0,9);
	
	$command = "/duel $opponent $gameindex";
	
	
	
	
$sql = "INSERT INTO messages (roomuuid,message-id,uuid,content)
VALUES ($roomuuid, $messageid, $uuid, $command)";


$query = $conn->query($sql);

if(!$query){
	$message= "Error! could not insert message",
	data = {
		"httpCode": "500",
		"status": "database_error",
		"message": $message
		
	};
	
http_response_code(500);


header('Content-Type: application/json');

echo json_encode($data);
	
}

else {
	$message = "sucessfully sent dual request.";
	

	
}




}
else {
	
	$message = "Error! Token is not valid. Please request a new token by logging in again.";
	
	$data = [
	'httpCode' => "403",
    'status' => 'login_required',
    'message' => $message
];
		 
		
		// Set the HTTP response status code to 403
http_response_code(403);

// Set the content type to application/json
header('Content-Type: application/json');

// Encode the data to JSON format and send it as a response
echo json_encode($data);
		
		
		
}






