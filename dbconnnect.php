<?php
$servername = "localhost";
$username = "member-book";
$password = "abc123";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conection Failed: " . $conn->connect_error);
}
?>