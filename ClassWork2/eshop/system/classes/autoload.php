<?php

function classLoader($className)  
{
    require_once($_SERVER['DOCUMENT_ROOT']."/iNordic/ClassWork/eshop/system/classes/$className.php");
}

spl_autoload_register('classLoader');     