<?php

$servername = "localhost";
$username = $_ENV['mysql_username'];
$password = $_ENV['mysql_password'];
$dbname = 'starclash';

$room = $_POST['room'];
$player = $_POST['player'];
$content = $_POST['content'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$messageid = openssl_random_pseudo_bytes(16, $strong);
// ensure the result is cryptographically strong
assert($data !== false && $strong);

$reason = $_POST['reason'];
$message = "/ban $player $reason";


$sql= "INSERT into messages (message-id,room,player,content) VALUES ($messageid,$room,$player,$content)";


$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $messageid, $room, $player, $content);

$stmt->execute();

//insert ban into database so player can naver connect again
$sql= "INSERT into bans(room,player,content) VALUES ($room,$player,$content)";


$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $, $room, $player, $content);

$stmt->execute();

?>


