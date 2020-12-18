<?php

class Section extends Unit
{

    const TABLE_NAME = 'core_sections'; 

    function getInfo() 
    {
        //make an object to connect to DB
        $link = mysqli_connect('localhost','root','','eshop' );

        //set encoding
        mysqli_set_charset($link,'utf8');
        
        //query text
        $request = 'select * from core_sections WHERE id='.$_GET['id']; 
        
        //send query and get result
        $results = mysqli_query($link, $request);

        $line = mysqli_fetch_assoc($results);

        return $line;
    }
    function getField($field) 
    {
        return $this->getInfo()[$field];  
    }
}