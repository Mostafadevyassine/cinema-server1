<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("../models/Seat.php");
require("../connection/connection.php");

$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

if (!$movie_id) {
    http_response_code(400);
    echo json_encode(["message" => "Missing movie_id"]);
    exit;
}

$seats = Seat::getByMovie($mysqli, $movie_id);
echo json_encode($seats);

// controllers/book_seat.php
?>