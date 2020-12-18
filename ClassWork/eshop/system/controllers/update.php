<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/autoload.php');



$_POST['class_name']::updateLine();

header('Location: http://localhost/iNordic/ClassWork/eshop/admin/?template=catalog&table=core_goods&title=%D0%A2%D0%9E%D0%92%D0%90%D0%A0%D0%AB');
