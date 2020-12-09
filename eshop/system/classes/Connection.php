<?php
class Connection{

    public function getTable($request){
                //make an object to connect to DB
                $link = mysqli_connect('localhost','root','','my_eshop' );

                //set encoding
                mysqli_set_charset($link,'utf8');

                //query text


                //send query and get result
                $results = mysqli_query($link, $request);

                //возвращаю все строки (resource)
                return $results;
    }
}
?>