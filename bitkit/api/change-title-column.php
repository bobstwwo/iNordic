<?php

$title = $_POST['title'];
$id = $_POST['id'];

require_once('connect.php');

echo "$title"."<br>$id";
$sql = "UPDATE columns SET title='$title' WHERE id='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
