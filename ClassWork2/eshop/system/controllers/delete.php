<?php 

var_dump($_GET); 

require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

$className = $_GET['class_name'];
$id = $_GET['id'];

$className::deleteLine($id); 

header('Location: ' . $_SERVER['HTTP_REFERER']); 