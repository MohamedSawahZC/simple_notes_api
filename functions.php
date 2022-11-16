<?php

define('MB',1048576);

function filter($payload){
    return htmlspecialchars(strip_tags($payload));
}

function ImageUpload($fieldName){
    global $msgError ;
    $imageName = rand(1000,10000) . $_FILES[$fieldName]["name"];
    $imageTmp = $_FILES[$fieldName]["tmp_name"];
    $imageSize = $_FILES[$fieldName]["size"];
    $allowExt = array("png", "jpg", "jpeg", "gif","mp3","pdf");
    $nameAsArray = explode(".",$imageName);
    $ext = end($nameAsArray);
    $ext = strtolower($ext);
    if (!empty($imageName)&& !in_array($ext,$allowExt)){
        $msgError[] = "Ext";
    }
    if ($imageSize>5 * MB){
        $msgError[] = "Size";
    }

    if(empty($msgError)){
        move_uploaded_file($imageTmp,"../Uploads/".$imageName);
        return $imageName;
    }else{
        echo "<pre>";
        print_r($msgError);
        echo "<pre>";
        return "Faild";
    }
}