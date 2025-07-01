<?php
require_once("Model.php");

class Showtime extends Model {

    public static function create(mysqli $mysqli, array $data) {
        $sql = "INSERT INTO showtimes (movie_id, show_date, show_time, auditorium) VALUES (?, ?, ?, ?)";
        $query = $mysqli->prepare($sql);
        $query->bind_param("isss",
            $data["movie_id"],
            $data["show_date"],
            $data["show_time"],
            $data["auditorium"]
        );
        $query->execute();
        return $query->affected_rows > 0 ? "Showtime added successfully." : "Failed to add showtime.";
    }
}
?>