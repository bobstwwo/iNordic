<?php

var_dump($_POST);


/*
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
*/

//коробки под ключи и значения
$fields = [];
$values = [];

foreach ($_POST as $field=>$value) {
    if($field != 'class_name') {
        $fields[] = $field;
        $values[] = "'".$value."'";
    }
}


require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

$className = $_POST['class_name'];   

$className::createLine($fields,$values);

//делаем перенаправление
//header('Location: '.$_SERVER['HTTP_REFERER']); 