<?php 
require("../connection/connection.php");
$query = "CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    favorite_genres TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$execute = $mysqli->prepare($query);
$execute->execute();
?>
