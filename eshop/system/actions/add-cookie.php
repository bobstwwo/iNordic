<?php
if ($_GET['id']) {
    if (isset($_COOKIE['basket'])) {
        $cook = $_COOKIE['basket'] . '%' . $_GET['id'];
        setcookie('basket', $cook, time() + 3600, '/');
    } else {
        setcookie('basket', $_GET['id'], time() + 3600, '/');
    }
}
header('Location:' . $_SERVER['HTTP_REFERER']);
