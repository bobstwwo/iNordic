<?php

class Connect 
{
   
    public static function getConnection() {

        //создаем ключ для подключения к БД
        $link = mysqli_connect('localhost','root','','eshop');

        //задаем ему кодировку
        mysqli_set_charset($link,'utf8');

        return $link; 
    }


}