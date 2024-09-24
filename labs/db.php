<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'users2';

$conn = mysqli_connect("localhost", "root", "", "users2");

if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}
?>