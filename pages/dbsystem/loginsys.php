<?php

require_once 'dbc.php';
include 'statsys.php';

session_start();

function verifyUser($email, $pass){
    if(password_verify($pass, verifyPass($email))){
        $_SESSION["logged"] = "true";
        $_SESSION["wrong"] = 0;
        setData($email, "log");
    }
    else{
        $_SESSION["error"] = "Invalid Email or Password";
        $_SESSION["wrong"] += 1;
    }
    if($_SESSION["wrong"] === 3)
    {
        logWrongPass($email);
        $_SESSION["wrong"] = 0;
    }
    header("Location: ../login");
}

function verifyPass($email) : string{
    $connection = DBC::getConnection();

    $getHashStatement = $connection->prepare("call get_hash(?, @hashx)");
    $getHashStatement->bind_param("s", $email);
    $getHashStatement->execute();
    $getHashStatement->store_result();

    $getHashResultStatement = $connection->prepare("select @hashx");
    $getHashResultStatement->execute();
    $getHashResultStatement->bind_result($hash);
    $getHashResultStatement->fetch();
    $getHashResultStatement->free_result();

    if($hash != null){
        return $hash;
    }
    else{
        return '';
    }
}

function logWrongPass($email){
    $file = fopen("../../logs/log.txt", "a");
    if ($file){
        $ip = $_SERVER['REMOTE_ADDR'];
        $text = "User with IP: '" . $ip . "' unsuccessfully tried three times to log on account: '" . $email . "'.\n";
        if (fwrite($file, $text)){
            fclose($file);
        }
    }
}

verifyUser($_POST["email"], $_POST["pass"]);

?>