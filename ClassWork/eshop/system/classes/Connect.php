<?php

class Connect
{
    public static function getConnection()
    {
        //make an object to connect to DB
        $link = mysqli_connect('localhost', 'root', '', 'eshop');

        //set encoding
        mysqli_set_charset($link, 'utf8');

        return $link;
    }
}
