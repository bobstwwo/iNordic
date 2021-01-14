<?php

require_once('connect.php');

$user = json_decode(file_get_contents('data/data.txt'), true);

$id = $user['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

// file_put_contents('data/numb.txt','last');
echo json_encode($result);
