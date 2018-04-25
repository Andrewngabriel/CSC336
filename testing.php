<?php
/*
Server: http://134.74.146.21
Schema: JCS18336ATM
Username: JCSP18GA23222043
Password: 23222043
*/

$servername = "134.74.146.21/phpmyadmin";
$username = "JCSP18GA2043";
$password = "23222043";
$database = "JCS18336ATM";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully\n";
}

?>