<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }
    public static function create(mysqli $mysqli, array $user_info) {
        $sql = "INSERT INTO users (email, password, full_name, date_of_birth, favorite_genres) 
                VALUES (?, ?, ?, ?, ?)";
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param(
            "sssss", 
            $user_info['email'], 
            $user_info['password'], 
            $user_info['full_name'], 
            $user_info['date_of_birth'], 
            $user_info['favorite_genres']
        );
    
        $stmt->execute();
        return $mysqli->insert_id; // return the new user ID
    }

   
}






 //you have to continue with the same mindset
    //Find a solution for sending the $mysqli everytime... 
    //Implement the following: 
    //1- update() -> non-static function 
    //2- create() -> static function
    //3- delete() -> non-static function 

