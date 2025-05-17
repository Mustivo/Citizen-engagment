<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // change this if needed
$db = 'citizen_engagement';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
