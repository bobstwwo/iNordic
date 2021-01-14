<?php


$id = $_POST['id'];

file_put_contents('data/numb.txt',$id);

echo "good";