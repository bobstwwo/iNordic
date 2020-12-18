<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/iNordic/ClassWork/eshop/system/classes/autoload.php');
abstract class Unit
{
    static function getAllLines()
    {
        //query text
        $request = 'select * from ' . static::TABLE_NAME;

        //send query and get result
        $results = mysqli_query(Connect::getConnection(), $request);

        //возвращаю все строки (resource)
        return $results;
    }

    public static function createLine($fields, $values)
    {
        $fields_str = implode(',', $fields);
        $values_str = implode(',', $values);

        //Формируем текст запроса
        $request_text = "INSERT INTO " . static::TABLE_NAME . " ($fields_str) VALUES ($values_str)";

        //Отправляем запрос в базу данных и получаем результат
        mysqli_query(Connect::getConnection(), $request_text);
    }

    public static function deleteLine($id)
    {
        $request_text = "DELETE FROM " . static::TABLE_NAME . " WHERE  id=" . $id;
        mysqli_query(Connect::getConnection(), $request_text);
    }

    public static function updateLine()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price;
        $description = $_POST['description'];

        if ($_POST['class_name'] == "Section") {
            $request_text = "UPDATE " . static::TABLE_NAME . " SET title = '" . $title . "' , description = '" . $description . "' WHERE id = " . $id;
        } else {
            $price = $_POST['price'];
            $request_text = "UPDATE " . static::TABLE_NAME . " SET title = '" . $title . "' , price = '" . $price . "' , description = '" . $description . "' WHERE id = " . $id;
        }
        mysqli_query(Connect::getConnection(), $request_text);
    }
}
