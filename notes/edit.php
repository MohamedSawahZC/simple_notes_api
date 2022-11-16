<?php
include "../connect.php";


// Secure your requests from scripts
$id = filter($_POST['id']);
$title = filter($_POST['title']);
$content = filter($_POST['content']);

$query = $connect->prepare("UPDATE `notes` SET `title`=?,`content`=? WHERE id=?");

$query->execute(array($title,$content,$id));

$count = $query->rowCount();
$new_note = $query->fetch(PDO::FETCH_ASSOC);
if ($count>0){
    echo json_encode(array("status" =>"Success","data" =>$new_note));
}else{
    echo json_encode(array("status" =>"Failure"));
}