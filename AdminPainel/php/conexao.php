<?php

$db_name = "db_angomart";
$db_user = "root";
$db_host = "localhost";
$db_password = "";

try{
    
    $conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

 }catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage(); 
}
?>