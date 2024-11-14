<?php

//get the latest count of message . CLient maintains a counter 


$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'starclash';

$roomuuid = $_POST['roomuuid'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to count the number of rows
$sql = "SELECT COUNT(*) AS total FROM messages WHERE roomuuid=$roomuuid"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $count = $row['total']; // Get the count from the associative array

    // Display the count
    //echo "Total number of rows: " . $count;
	data = {
		"httpCode": 200,
		"response_name": "messageindex",
		"count": $count;
	}
	
	http_response_code(200);
	
	header('Content-Type: application/json');

echo json_encode($data);
	
	
} else {
    //echo "Error: " . $conn->error;
	
	$data = {
	"httpcode": "500",
	"response_code": "listrooms_failed",
	"message": "Failed to list the rooms check your connection.";
};

http_response_code(500);
header('Content-Type: application/json');

echo json_encode($data);
	
	
}

// Close the connection
$conn->close();
?>



