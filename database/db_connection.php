<?php
// db_connection.php

$host = 'localhost'; // Change to your database host
$db = 'e-learning'; // Change to your database name
$user = 'root'; // Change to your database username
$password = ''; // Change to your database password

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>