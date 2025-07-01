<?php
require_once("Model.php");

class Booking extends Model {
    public static function create($mysqli, $data) {
        $query = $mysqli->prepare("INSERT INTO bookings (user_id, movie_id, seat_count) VALUES (?, ?, ?)");
        $query->bind_param("iii", $data["user_id"], $data["movie_id"], $data["seat_count"]);
        return $query->execute();
    }
}
?>