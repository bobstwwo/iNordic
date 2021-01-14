<?php
require('db.php');
unset($_SESSION['logged_user']);
file_put_contents('api/data/board-id.txt', ' ');
file_put_contents('api/data/data.txt', ' ');
file_put_contents('api/data/new-board.txt', ' ');
file_put_contents('api/data/numb.txt', ' ');
header('Location: http://localhost/iNordic/bitkit/');
