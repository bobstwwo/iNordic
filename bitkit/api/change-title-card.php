<?php
require_once('connect.php');
session_start();

$title = $_POST['title'];

if (isset($_SESSION['card_id'])) {
    $id = $_SESSION['card_id'];
    $sql = "UPDATE cards SET title='$title' WHERE id='$id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo json_encode($id);
}
