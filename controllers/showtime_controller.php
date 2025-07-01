<?php
require("../models/Showtime.php");
require("../connection/connection.php");


if ($action === "create") {
    if (
        isset($_GET["movie_id"]) &&
        isset($_GET["show_date"]) &&
        isset($_GET["show_time"]) &&
        isset($_GET["auditorium"])
    ) {
        $data = [
            "movie_id" => $_GET["movie_id"],
            "show_date" => $_GET["show_date"],
            "show_time" => $_GET["show_time"],
            "auditorium" => $_GET["auditorium"]
        ];

        $result = Showtime::create($mysqli, $data);
        $response["message"] = $result;
    } else {
        $response["message"] = "Missing required fields.";
    }
} 

echo json_encode($response);
?>