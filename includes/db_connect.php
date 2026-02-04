<?php
$servername = "localhost:3307";
$username = "root";
$password = ""; // Default XAMPP password is empty
$dbname = "examhub_db"; // The database we created in phpMyAdmin

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection worked
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}

// Set character set to utf8 to support all exam languages
mysqli_set_charset($conn, "utf8");
?>