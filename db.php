<?php
$user = 'root';
$password = 'root';
$db = 'ATM';
$host = 'localhost';

$conn = new mysqli($host, $user, $password, $db);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully" . "<br>";
// }

?>
