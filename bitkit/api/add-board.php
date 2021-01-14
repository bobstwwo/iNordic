<?php

file_put_contents('data/new-board.txt', $_GET);

$data = json_decode(file_get_contents('data/new-board.txt'), true);

$title = $data['title'];
$bg = $data['bg'];

require_once('connect.php');

// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

$sql = "INSERT INTO boards (title, bg) VALUES ('$title', '$bg')";
if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//Индекс только что добавленной доски, нужен чтобы записать в столбец board в таблице users
$last_id = $conn->insert_id;
$user = json_decode(file_get_contents('data/data.txt'), true);
$user_id =  $user['id'];

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_fetch_row(mysqli_query($conn, $sql));
$str = $result[5];
$boards = '';
if ($str == '') {
    $boards = $last_id;
} else {
    $boards = $str . "," . $last_id;
}
$sql = "UPDATE users SET boards='$boards' WHERE id='$user_id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
file_put_contents('data/numb.txt','last');