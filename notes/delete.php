<?php
include "../connect.php";


// Secure your requests from scripts
$id = filter($_POST['id']);
$imageName = filter("imageName");



$query = $connect->prepare("DELETE FROM notes WHERE id=?");

$query->execute(array($id));

$count = $query->rowCount();

if ($count>0){
    
    deleteFile("../Upload",$imageName);
    echo json_encode(array("status" =>"Success"));
}else{
    echo json_encode(array("status" =>"Failure"));
}