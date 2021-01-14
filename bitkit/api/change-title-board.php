<?php
$id = file_get_contents('data/board-id.txt');

$title = $_POST['title'];

require_once('connect.php');

$sql = "UPDATE boards SET title='$title' WHERE id='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
