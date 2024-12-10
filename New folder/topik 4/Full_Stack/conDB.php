<?php
$servername = "localhost"; // default
$username ="root";        // user MySQL
$password ="";           // password
$dbname ="db_point_of_sales"; // nama database
//Buat connection
$conn = new mysqli ($servername, $username, $password, $dbname);

//Periksa connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>