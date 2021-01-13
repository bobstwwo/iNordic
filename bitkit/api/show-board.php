<?php

$servername = "localhost";
$database = "trello";
$username = "root";
$password = "";

// Устанавливаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);

$user = json_decode(file_get_contents('data.txt'), true);

$id = $user['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);


$name = $result[3];
$surname = $result[4];
$boards = $result[5];

$pieces = explode(",", $boards);

$board_id = end($pieces);

$sql = "SELECT * FROM boards WHERE id = '$board_id'";
$rez = mysqli_query($conn, $sql);
$result = mysqli_fetch_row($rez);

$title = $result[1];
$bg = $result[2];

$arr = array();

$arr[] = $name;
$arr[] = $surname;
$arr[] = $title;
$arr[] = $bg;

echo json_encode($arr);
