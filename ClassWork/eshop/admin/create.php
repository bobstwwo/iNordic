<?php


$table = $_POST['table'];

$fields = [];
$values = [];
foreach ($_POST as $field=>$value){
    if($field != 'table') {
        $fields[] = $field;
        $values[] = "'" . $value . "'";
    }
}

$fields_str = implode(',',$fields);
$values_str = implode(',',$values);

//Создаем ключ для подключения БД
$connect = mysqli_connect('localhost','root','','eshop');

//Задаем ему кодировку
mysqli_set_charset($connect,'utf8');

//Формируем текст запроса
$request_text = "INSERT INTO $table ($fields_str) VALUES ($values_str)";

//Отправляем запрос в базу данных и получаем результат
mysqli_query($connect,$request_text);
header('Location:'.$_SERVER['HTTP_REFERER']);