<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("../models/Movie.php");
require("../connection/connection.php");

$movie_id = $_GET['movie_id'] ?? null;

if (!$movie_id) {
    http_response_code(400);
    echo json_encode(["message" => "Missing movie_id"]);
    exit;
}

$movie = Movie::getById($mysqli, intval($movie_id));

if ($movie) {
    echo json_encode($movie);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Movie not found"]);
}
?>