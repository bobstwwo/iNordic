<?php

abstract class Unit   
{
    static function getAllLines() 
    {
        
        //query text
        $request = 'select * from '.static::TABLE_NAME;    
        
        //send query and get result
        $results = mysqli_query(Connect::getConnection(), $request);  

        //возвращаю все строки (resource)
        return $results;
    }


    public static function createLine($fields, $values)
    {   
    
        $fields_str = implode(',',$fields);
        $values_str = implode(',',$values);

        //формируем текст запроса
        $request_text = "INSERT INTO " . static::TABLE_NAME . " ($fields_str) VALUES ($values_str)";     
        echo $request_text;

        //отправляем запрос в БД и получаем результат
        mysqli_query(Connect::getConnection(),$request_text); 
    }

    public static function deleteLine($id)
    {
        // DELETE FROM core_goods WHERE id=2  
        $request_text = "DELETE FROM " . static::TABLE_NAME . " WHERE id=".$id;

        //отправляем запрос в БД и получаем результат
        mysqli_query(Connect::getConnection(),$request_text); 
    }

}