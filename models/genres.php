<?php
require_once("Model.php");

class Genre extends Model {

    public static function create(mysqli $mysqli, array $data) {
        $sql = "INSERT INTO genres (name) VALUES (?)";
        $query = $mysqli->prepare($sql);
        $query->bind_param("s", $data["name"]);
        $query->execute();
        return $query->affected_rows > 0 ? "Genre added successfully." : "Failed to add genre.";
    }

    public static function getAll(mysqli $mysqli) {
        $sql = "SELECT * FROM genres ORDER BY name ASC";
        $result = $mysqli->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>