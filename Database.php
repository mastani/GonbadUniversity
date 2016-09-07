<?php

//$servername = 'localhost';
//$username = 'clashira_begli';
//$password = 'Alibegli123';
//$database = 'clashira_manager_begli';

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'alibegli';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
