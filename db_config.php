<?php
$host = "DB-ENDPOINT";
$username = "admin";
$password = "yourpassword";
$database = "utrains";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
