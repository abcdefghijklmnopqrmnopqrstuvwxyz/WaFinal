<?php

include 'dbc.php';

session_start();

verifyUser($_POST["email"], $_POST["pass"]);


function verifyUser($email, $pass){
    $connection = DBC::getConnection();
    $statement = $connection->prepare("SELECT email, password FROM user WHERE email = ? and password = ?");
    $statement->bind_param("ss", $email, $pass);
    $statement->execute();
    $result = $statement->get_result();
    if($result->num_rows > 0){
        header("Location: ../pages/gallery.php");
        return;
    }
    $_SESSION["error"] = "Invalid Email or Password";
    header("Location: ../pages/login.php");
}

?>