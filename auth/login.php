<?php

include "../connect.php";

$email = filter($_POST['email']);
$password = filter($_POST['password']);

$query = $connect->prepare("SELECT * FROM users WHERE email=? AND password=?");

$query->execute(array($email , $password));

$count = $query->rowCount();

$user = $query->fetch(PDO::FETCH_ASSOC);

if ($count>0){
    echo json_encode(array("status" =>"Success", "data" =>$user));
}else{
    echo json_encode(array("status" =>"failure", "message" =>"User name or password incorrect"));
}