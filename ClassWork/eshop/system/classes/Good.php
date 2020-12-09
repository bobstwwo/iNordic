<?php

class Good extends Unit
{
    const TABLE_NAME = 'core_goods';

    function getInfo() 
    {
        //make an object to connect to DB
        $link = mysqli_connect('localhost','root','','eshop' );

        //set encoding
        mysqli_set_charset($link,'utf8');
        
        //query text
        $request = 'select * from core_goods WHERE id='.$_GET['id']; 
        
        //send query and get result
        $results = mysqli_query($link, $request);

        $line = mysqli_fetch_assoc($results);

        return $line;
    }



    function getField($field) 
    {
        return $this->getInfo()[$field];  
    }

    function photo() 
    {
        return $this->getInfo()['photo'];
    }

    function title() 
    {
        return $this->getInfo()['title'];
    }

    function price() 
    {
        return $this->getInfo()['price'];
    }

    function id() 
    {
        
        $line = $this->getInfo();
        return $line['id'];
    }

}