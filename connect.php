<?php

include "functions.php";

$dsn = "mysql:host=localhost:3307;dbname=notesapp";

$user = "root";
$pasword = "root";

$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8", // To support arabic
);

try {
    
$connect = new PDO($dsn , $user , $pasword , $option);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $error){
    echo $error->getMessage();
}

?>