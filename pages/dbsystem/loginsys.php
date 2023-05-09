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
        $_SESSION["logged"] = "true";
        header("Location: ../logout");
        return;
    }
    $_SESSION["error"] = "Invalid Email or Password";
    header("Location: ../login");
}

?>