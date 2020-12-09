<?php

abstract class Unit   
{
    static function getAllLines() 
    {
        //make an object to connect to DB
        $link = mysqli_connect('localhost','root','','eshop' );

        //set encoding
        mysqli_set_charset($link,'utf8');
        
        //query text
        $request = 'select * from '.static::TABLE_NAME;   
        
        //send query and get result
        $results = mysqli_query($link, $request);

        //возвращаю все строки (resource)
        return $results;
    }
}