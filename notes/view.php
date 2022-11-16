<?php

include "../connect.php";

$user_id = filter($_POST['id']);

$query = $connect->prepare("SELECT * FROM notes WHERE user =?");

$query->execute(array($user_id));

$notes = $query->fetchAll(PDO::FETCH_ASSOC);


if ($notes){
    echo json_encode(array("status"=>"Success","data"=>$notes));
}else{
    echo json_encode(array("status"=>"Success","message"=>"There were no notes"));
}