<?php
require("../connection/connection.php");

$query = "CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$execute = $mysqli->prepare($query);
$execute->execute();
?>