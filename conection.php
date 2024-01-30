<?php 
$servername = "localhost";
$username = "root";
$password = "Welkom01";
$dbname = "databaseblog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful


// dit is om connectie te maken met de database
?>