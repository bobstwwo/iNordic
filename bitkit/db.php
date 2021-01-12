<?php

require "libs/rb-mysql.php"; 
R::setup( 'mysql:host=localhost;dbname=trello',
'root', '');
session_start();