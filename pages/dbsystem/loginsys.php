<?php

include 'dbc.php';

session_start();

function verifyUser($email, $pass){
    $connection = DBC::getConnection();

    $statement = $connection->prepare("call login (?, ?, @logsuccess)");
    $statement->bind_param("ss", $email, $pass);
    $statement->execute();
    $statement->store_result();

    $outputStatement = $connection->prepare("select @logsuccess");
    $outputStatement->execute();
    $outputStatement->bind_result($logsuccess);
    $outputStatement->fetch();
    $outputStatement->free_result();

    if($logsuccess == 1){
        $_SESSION["logged"] = "true";
        setData($email);
        header("Location: ../login");
        return;
    }
    
    $_SESSION["error"] = "Invalid Email or Password";
    header("Location: ../login");
}

function setData($email){
    $connection = DBC::getConnection();

    $statement = $connection->prepare("call get_stats (?, @namex, @viewsx, @likesx, @dislikesx, @logsx)");
    $statement->bind_param("s", $email);
    $statement->execute();
    $statement->store_result();

    $outputStatement = $connection->prepare("select @namex, @viewsx, @likesx, @dislikesx, @logsx");
    $outputStatement->execute();
    $outputStatement->bind_result($namex, $viewsx, $likesx, $dislikesx, $logsx);
    $outputStatement->fetch();
    $outputStatement->free_result();

    $_SESSION["name"] = $namex;
    $_SESSION["views"] = $viewsx;
    $_SESSION["likes"] = $likesx;
    $_SESSION["dislikes"] = $dislikesx;
    $_SESSION["logs"] = $logsx;
}

function verifyPass($pass) : string{
    $password = password_verify($pass, $passwordx);
    return $password;
}

verifyUser($_POST["email"], $_POST["pass"]);

?>