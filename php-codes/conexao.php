<?php

$db_name = "db_angomart";
$db_user = "root";
$host = "localhost";
$db_pass = "";

$conn = new PDO("mysql:dbname=$db_name; host=$host", $db_user, $db_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>