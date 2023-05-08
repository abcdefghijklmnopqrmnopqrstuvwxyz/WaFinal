<?php

session_start();
include 'dbc.php';

if (empty($_POST["email"]) || empty($_POST["pass"])) {
    header('Location: ../index.html');
    exit();
}

verifyUser($_POST["email"], $_POST["pass"]);


function verifyUser($email, $pass){
    $connection = DBC::getConnection();
    $statement = $connection->prepare("SELECT email, password FROM users WHERE email = ? and password = ?");
    $statement->bind_param("ss", $email, $pass);
    $statement->execute();
    $result = $statement->get_result();
    if($result->num_rows > 0){
        
        return;
    }
    $_SESSION["error"] = "Invalid login";
    header("Location: ../pages/login.html");
}

?>