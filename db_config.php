<?php
$host = "${db_host}";
$username = "${db_name}";
$password = "${db_user}";
$dbname =  "${db_password}";                #"utrains";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
