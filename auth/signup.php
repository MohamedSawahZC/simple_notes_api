<?php
include "../connect.php";


// Secure your requests from scripts
$username = filter($_POST['username']);
$email = filter($_POST['email']);
$password = filter($_POST['password']);

$query = $connect->prepare("INSERT INTO `users`( `username`, `email`,`password`) VALUES (? , ? , ?)");

$query->execute(array($username,$email,$password));

$count = $query->rowCount();

if ($count>0){
    echo json_encode(array("status" =>"Success"));
}else{
    echo json_encode(array("status" =>"Failure"));
}