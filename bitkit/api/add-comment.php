<?php
require_once('connect.php');
session_start();

$text = $_POST['text'];

if (isset($_SESSION['card_id'])) {
    $id = $_SESSION['card_id'];
    $sql = "UPDATE cards SET description='$text' WHERE id='$id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo json_encode($id);
}
