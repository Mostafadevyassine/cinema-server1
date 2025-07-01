<?php
require("../connection/connection.php");


$query = "SELECT id, name, description, poster, release_date, duration_minutes, language, price FROM movies ORDER BY release_date DESC";
$result = $mysqli->query($query);

$movies = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    $response["movies"] = $movies;
} else {
    $response["message"] = "Failed to load movies.";
}

echo json_encode($response);
?>