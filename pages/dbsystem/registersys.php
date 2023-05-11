<?php

include 'dbc.php';

session_start();

function addUser($name, $email, $pass){
    $connection = DBC::getConnection();
    
    $statement = $connection->prepare("call add_user (?, ?, ?, @success)");
    $statement->bind_param("sss", $name, $email, hashPass($pass));
    $statement->execute();
    $statement->store_result();

    $outputStatement = $connection->prepare("select @success");
    $outputStatement->execute();
    $outputStatement->bind_result($success);
    $outputStatement->fetch();
    $outputStatement->free_result();

    if($success == 1){
        $_SESSION["report"] = "Registration was successful.";
        header("Location: ../register");
        return;
    }

    $_SESSION["reportun"] = "Registration was NOT successful, name or email are already used.";
    header("Location: ../register");
}

function hashPass($pass) : string{
    $password = password_hash($pass, PASSWORD_DEFAULT);
    return $password;
}

addUser($_POST["name"], $_POST["email"], $_POST["pass"]);

?>