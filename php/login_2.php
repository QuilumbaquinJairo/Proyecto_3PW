<?php

try{

    $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

    if (isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $pass = md5($password);
        $query = "SELECT * FROM usuarios WHERE usuario = :user";

        $statement = $db->prepare($query);
        $statement->bindParam(':user', $user, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row && $pass == $row['password']) {
            unset($row['password']);
            $data = $row;
            echo json_encode($data);
        }else{
            $data=null;
            echo json_encode($data);
        }
    }

}catch (Exception $e){
    die('Error' .$e ->getMessage());
} finally {
    $db=null;
}