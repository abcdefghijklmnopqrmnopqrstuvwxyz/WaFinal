<?php

require_once 'dbc.php';

function setData($email, $stat){
    getData($email);

    switch($stat){
        case 'like':
            $_SESSION["likes"] += 1;
            break;
        case 'generate':
            $_SESSION["views"] += 1;
            break;
        case 'dislike':
            $_SESSION["dislikes"] += 1;
            break;
        case 'log':
            $_SESSION["logs"] += 1;
            break;
    }

    $connection = DBC::getConnection();

    $statement = $connection->prepare("call set_stats (?, ?, ?, ?, ?)");
    $statement->bind_param("siiii", $email, $_SESSION["views"], $_SESSION["likes"], $_SESSION["dislikes"], $_SESSION["logs"]);
    $statement->execute();
}

function getData($email){
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

?>