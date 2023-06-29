<?php

$servername = "localhost";  // Replace with your database server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$database = "toko";  // Replace with your database name

// Create a connection
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// You can perform database operations here using the $conn object

?>
