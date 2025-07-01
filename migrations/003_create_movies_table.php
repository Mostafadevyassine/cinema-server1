<?php
require("../connection/connection.php");

$query = "CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    poster longtext NOT NULL,
    release_date DATE NOT NULL,
    duration_minutes INT NOT NULL,
    language VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$execute = $mysqli->prepare($query);
$execute->execute();
?>