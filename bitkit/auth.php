<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/auth.css">
    <title>Вход</title>
</head>

<body>
    <div class="wrapper">
        <div class="form">
            <div class="title">Вход в Trello</div>
            <div class="login"><input placeholder="Логин" type="text"></div>
            <div class="password"><input placeholder="Пароль" type="text"></div>
            <div class="button"> <span>Войти</span> </div>
            <div class="registration">или <a href="#">Регистрация</a></div>
            <?php
            $user = wp_get_current_user();
            ?>
        </div>
    </div>
</body>

</html>