<?php
require('db.php');
?>

<?php
if (isset($_SESSION['logged_user'])) : ?>
    <!-- <a href="logout.php">Выйти</a> -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link href="templates.html">
        <title>Trello</title>

    </head>

    <body>
        <div id="root" class="wrapper">

        </div>
        <?php
        include_once('templates.php');
        ?>
        <!--ПОДКЛЮЧЕНИЕ JQUERY-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- ПОДКЛЮЧЕНИЕ СКРИПТ-ЗАПРОСА -->
        <script src="js/xhr.js"></script>
        <!-- ПОДКЛЮЧЕНИЕ AUTOSIZE -->
        <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
        <!--ПОДКЛЮЧЕНИЕ MAIN JS-->
        <script src="js/script.js"></script>


    </body>

    </html>
<?php else : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/auth.css">
        <title>Вход</title>
        <!--ПОДКЛЮЧЕНИЕ JQUERY-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!--ПОДКЛЮЧЕНИЕ MAIN JS-->
        <script src="js/auth.js"></script>
    </head>

    <body>
        <?php
        require_once('db.php');
        $data = $_POST;
        if (isset($data['do_login'])) {
            $errors = array();
            $user = R::findOne('users', 'login = ?', array($data['login']));
            if ($user) {
                // Логин существует

                if ($user->password == $data['password']) {
                    //  Все хорошо, логиним пользователя

                    $_SESSION['logged_user'] = $user;
                    file_put_contents('api/data/data.txt', $user);
                    // echo "<div style='color:yellow;'>Вы авторизованы</div><hr>";
                    header("Refresh:0");
                } else {
                    $errors[] = 'Неверно введен пароль!';
                }
            } else {
                $errors[] = 'Пользователь с таким логином не найден!';
            }
            if (!empty($errors)) {
                echo "<div style='color:red;'>" . array_shift($errors) . "</div><hr>";
            }
        }
        if (isset($data['do_signup'])) {
            // РЕГАЕМ

            $errors = array();
            if (trim($data['login']) == '') {
                $errors[] = 'Введите логин!';
            }
            if (($data['password']) == '') {
                $errors[] = 'Введите пароль!';
            }
            if (($data['password_2']) != $data['password']) {
                $errors[] = 'Повторный пароль введен неверно!';
            }
            if (trim($data['name']) == '') {
                $errors[] = 'Введите имя!';
            }
            if (trim($data['surname']) == '') {
                $errors[] = 'Введите фамилию!';
            }
            if (R::count('users', 'login = ?', array($data['login'])) > 0) {
                $errors[] = 'Пользователь с таким login уже существует!';
            }

            if (empty($errors)) {
                // Все хорошо, регистрируем

                $users = R::dispense('users');
                $users->login = $data['login'];
                $users->password = $data['password'];
                $users->name = $data['name'];
                $users->surname = $data['surname'];
                R::store($users);
                // echo "<div style='color:yellow;'>Вы успешно зарегистрированы</div><hr>";
                header("Refresh:0");
            } else {
                echo "<div style='color:black;'>" . array_shift($errors) . "</div><hr>";
            }
        }
        ?>
        <div class="wrapper">
            <!-- LOGIN -->
            <div id="login" class="form">
                <form action="index.php" method="POST">
                    <div class="title">Вход в Trello</div>
                    <div class="login"><input name="login" placeholder="Логин" type="text"></div>
                    <div class="password"><input name="password" placeholder="Пароль" type="password"></div>
                    <div class="button">
                        <button type="submit" name="do_login">Войти</button>
                    </div>
                    <div class="registration">или <span onclick="formReg()">Регистрация</span></div>
                </form>
            </div>
            <!-- REGISTRATION -->
            <div id="reg" class="form">
                <form action="index.php" method="POST">
                    <div class="title">Регистрация</div>
                    <div class="login"><input name="login" placeholder="Логин" type="text"></div>
                    <div class="password"><input name="password" placeholder="Пароль" type="password"></div>
                    <div class="password"><input name="password_2" placeholder="Повторите пароль" type="password"></div>
                    <div class="name"><input name="name" placeholder="Имя" type="text"></div>
                    <div class="surname"><input name="surname" placeholder="Фамилия" type="text"></div>
                    <div class="button" name=""><button type="submit" name="do_signup">Зарегистрироваться</button></div>
                </form>
                <div class="back__to-login" onclick="formAuth()">
                    <span>Перейти на страницу входа</span>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php endif; ?>