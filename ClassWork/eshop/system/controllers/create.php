<?php

$fields = [];
$values = [];
foreach ($_POST as $field=>$value){
    if($field != 'class_name') {
        $fields[] = $field;
        $values[] = "'" . $value . "'";
    }
}
    
$className = $_POST['class_name'];

include($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/Unit.php');
include($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/Good.php');
include($_SERVER['DOCUMENT_ROOT'].'/iNordic/ClassWork/eshop/system/classes/Section.php');
$className::createLine($fields,$values);
header('Location: http://localhost/iNordic/ClassWork/eshop/admin/?template=catalog&table=core_goods&title=%D0%A2%D0%9E%D0%92%D0%90%D0%A0%D0%AB');