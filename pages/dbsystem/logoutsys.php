<?php

session_start();
unset($_SESSION["error"]);
$_SESSION["logged"] = "false";
header("Location: ../login");

?>