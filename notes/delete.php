<?php
include "../connect.php";


// Secure your requests from scripts
$id = filter($_POST['id']);

$query = $connect->prepare("DELETE FROM notes WHERE id=?");

$query->execute(array($id));

$count = $query->rowCount();

if ($count>0){
    echo json_encode(array("status" =>"Success"));
}else{
    echo json_encode(array("status" =>"Failure"));
}