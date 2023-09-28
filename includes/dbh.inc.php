<?php
$host = "localhost";
$username = "root"; 
$password = "Password"; 
$database = "bakery_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: at dbh.inc.php " . $conn->connect_error);
}