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

echo json_encode($result);
