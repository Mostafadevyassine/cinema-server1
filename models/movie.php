<?php
require_once("Model.php");

class Movie extends Model {

    // Add new movie
    public static function add($mysqli, $data) {
        $query = $mysqli->prepare(
            "INSERT INTO movies (name, poster, release_date, duration_minutes, language, price) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );

        if (!$query) {
            return false;
        }

        $query->bind_param(
            "sssisd",
            $data["name"],
            $data["poster"],
            $data["release_date"],
            $data["duration"],
            $data["language"],
            $data["price"]
        );

        return $query->execute();
    }

    // Get all movies (for index.html)
    public static function getAll($mysqli) {
        $result = $mysqli->query("SELECT id, name, poster FROM movies ORDER BY release_date DESC");
        $movies = [];
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        return $movies;
    }

    // Get a single movie by ID (for booking.html)
    public static function getById($mysqli, $id) {
        $query = $mysqli->prepare("SELECT id, name, price FROM movies WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }
}
?>