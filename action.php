<?php

/* Explain the action file

Possible actions, place,quit,drawcard,duel 
a certain number can be placed at a time.


*/
$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'cells';

$token = $_POST['token'];
$roomuuid = $_POST['roomuuid'];
$player = $_POST['player'];

if($action = 'place'){
$x = $_POST['x'];
$y = $_POST['y'];
	
	
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "select * from cells where x = $x and y = $y";

$q = $conn->query($sql);
 
	if($q->num_rows > 0){
	
	$message = "Hey $player A duel is required to gain control of this square. Get Ready to Duel!";
	
	
	// Sample data to be sent as JSON
$data = [
	'httpCode' => "403",
    'status' => 'dual_required',
	'x' = $x,
	'y' = $y,
    'message' => $message
];

// Set the HTTP response status code to 403
http_response_code(403);

// Set the content type to application/json
header('Content-Type: application/json');

// Encode the data to JSON format and send it as a response
echo json_encode($data);
	
	
	
}


else {



$sql = "INSERT INTO cells (roomuuid, player, x,y)
VALUES ($roomuuid, $player, $x, $y)";

if ($conn->query($sql) === TRUE) {
  echo "New cell created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}




$conn->close();
	
	
	
	
	
	





}

if(action = "duel"){
	
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cells (roomuuid, player, x,y)
VALUES ($roomuuid, $player, $x, $y)";

if ($conn->query($sql) === TRUE) {
  echo "New cell created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	
}







?>



