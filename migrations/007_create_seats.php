<?php
require("../connection/connection.php");

$query = "CREATE TABLE seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    auditorium VARCHAR(50) NOT NULL,
    seat_row VARCHAR(5) NOT NULL,
    seat_number INT NOT NULL,
    UNIQUE (auditorium, seat_row, seat_number)
)";

$execute = $mysqli->prepare($query);
$execute->execute();
?>