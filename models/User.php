<?php
require_once("Model.php");

class User extends Model{

    public static function create(mysqli $mysqli , array $data){
        $sql = "INSERT INTO users (email, password, full_name, date_of_birth, favorite_genres) VALUES (?,?,?,?,?)";
        $query = $mysqli->prepare($sql);
        $query->bind_param("sssss",
        $data["email"],
        $data["password"],
        $data["full_name"],
        $data["date_of_birth"],
        $data["favorite_genres"]
    );
        $query->execute();
        return $query->affected_rows > 0 ? "Welcome!" : "Failed to register.";
    }
    public static function login(mysqli $mysqli, array $data) {
        $sql = "SELECT id, email, full_name, favorite_genres FROM users WHERE email = ? AND password = ?";
        $query = $mysqli->prepare($sql);
        $query->bind_param("ss", $data["email"], $data["password"]);
        $query->execute();
        $result = $query->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // return user info
        } else {
            return null;
        }
    }
}
?>
