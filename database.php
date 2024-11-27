<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test"; // Specify the name of the database

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
   
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Select the database
mysqli_select_db($conn, $dbname);

// Create the table
$query = "
CREATE TABLE IF NOT EXISTS Clients (
    id INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    nom varchar(20) , 
    prenom varchar(20) , 
    role int 
)";
if (mysqli_query($conn, $query)) {
   
} else {
    
}

// Close the connection


?>
