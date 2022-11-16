<?php
include "../connect.php";


// Secure your requests from scripts
$title = filter($_POST['title']);
$content = filter($_POST['content']);
$user_id = filter($_POST['user_id']);
$image = ImageUpload('image');

if ($image != 'Faild'){
    $query = $connect->prepare("INSERT INTO `notes`( `title`, `content`,`user`,`image`) VALUES (? , ? , ?,?)");

$query->execute(array($title,$content,$user_id,$image));

$count = $query->rowCount();
if ($count>0){
    echo json_encode(array("status" =>"Success"));
}else{
    echo json_encode(array("status" =>"Failure"));
}
}else{
    echo json_encode(array("status" =>"Failure"));
}