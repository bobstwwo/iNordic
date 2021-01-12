<?php
require_once('db.php');
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
        <!-- FONTS -->
    </head>

    <body>
        <div class="wrapper">
            <div class="top df">
                <div class="top-left df">
                    <div class="boards hov">
                        <img id="header-gif" src="images/header.gif" alt="">
                        <span>Доски</span>
                    </div>
                </div>
                <div class="top-middle">
                    <img id="header-logo" src="images/header-logo.png" alt="">
                </div>
                <div class="top-right df">
                    <div class="add hov">
                        <svg width="24" height="24" role="presentation" focusable="false" viewBox="0 0 24 24">
                            <path d="M12 3a1 1 0 00-1 1v7H4a1 1 0 100 2h7v7a1 1 0 102 0v-7h7a1 1 0 100-2h-7V4a1 1 0 00-1-1z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="info hov">
                        <svg width="24" height="24" role="presentation" focusable="false" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 20a8 8 0 100-16 8 8 0 000 16zm0 2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" fill="currentColor"></path>
                            <path d="M11 11a1 1 0 112 0v5a1 1 0 11-2 0v-5zm2-3a1 1 0 11-2 0 1 1 0 012 0z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="account">
                        BK
                    </div>
                </div>
            </div>
            <div class="pre-top df">
                <div class="menu hov">
                    <img id="dots" src="images/dots.svg" alt="">
                    <span>Меню</span>
                </div>
                <div class="board-title">
                    Lean Canvas
                </div>
                <div class="favorites">
                    <img id="star" src="images/star.svg" alt="">
                </div>
                <div class="line"></div>
                <div class="invite hov">
                    Пригласить
                </div>
            </div>
            <div class="my-board">
                <div class="columns df">
                    <div class="column">
                        <div class="column__top df">
                            <div class="column__top-title">
                                <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
                                <textarea class="autosize" onclick="this.select()" id="textarea">Revenue Streams</textarea>
                            </div>
                            <div class="column__top-menu">
                                <img src="images/dots.svg" alt="">
                            </div>
                        </div>
                        <div class="cards">
                            <div class="card" onclick="clickOnCard(this)">
                                <div class="card__top">
                                    <div class="mark">
                                        Companies
                                    </div>
                                    <div class="mark">
                                        Ads
                                    </div>
                                    <div class="mark">
                                        Video
                                    </div>
                                    <div class="mark">
                                        Ads
                                    </div>
                                    <div class="mark">
                                        Video
                                    </div>
                                </div>
                                <div class="df">
                                    <div class="card__text">
                                        <span>
                                            Can't be easily copied or bought
                                        </span>
                                    </div>
                                    <div class="card__pencil">
                                        <img src="images/pencil.svg" alt="">
                                    </div>
                                </div>
                                <div class="card__bottom">
                                    <img class="forhover" src="images/product-description.svg" alt="">
                                    <p class="hint">Эта карточка с описанием.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add__column df" onclick="addColumn(this)">
                        <div class="add__column-plus">
                            <img src="images/plus.svg" alt="">
                        </div>
                        <div class="add__column-text">
                            Добавить еще одну колонку
                        </div>
                    </div>
                </div>
            </div>
            <div id="popup" class="popup">
                <div class="popup__body">
                    <div class="popup__content">
                        <div class="popup__close" onclick="popupClose()">
                            <img src="images/cancel.svg" alt="">
                        </div>
                        <div class="popup__title df">
                            <div class="popup__title-icon">
                                <img src="images/top.svg" alt="">
                            </div>
                            <div class="popup__title-textarea">
                                <textarea class="autosize" onclick="this.select()">Название</textarea>
                            </div>
                        </div>
                        <div class="popup__marks">
                            <div class="popup__marks-title">
                                Метки
                            </div>
                            <div class="popup__marks-container df">
                                <div class="all-marks df">
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        Employers
                                    </div>
                                    <div class="popup-mark">
                                        E
                                    </div>
                                    <div class="add__mark-btn" onclick="newPopupOpen();">
                                        <img src="images/plus.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="new-popup">
                                <div class="fixed-marks">
                                    <div class="new-popup-top">
                                        <div class="fixed">
                                            <div class="new-popup-top-title">
                                                Метки
                                            </div>
                                            <div class="new-popup__close">
                                                <img src="images/cancel.svg" alt="" onclick="newPopupClose()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-popup-middle">
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="middle__item df">
                                            <div class="middle__item-left df">
                                                <div class="mark-text">
                                                    Video
                                                </div>
                                                <div class="mark-tick">
                                                    <img src="images/tick.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="middle__item-right">
                                                <img src="images/pencil.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-popup-bottom" onclick="createMark()">
                                        <span>Создать новую метку</span>
                                    </div>
                                </div>
                                <div class="create__new-mark" style="display: none;">
                                    <div class="new-popup-top">
                                        <div class="fixed">
                                            <div class="new-popup-top-title">
                                                Создание метки
                                            </div>
                                            <!-- Кнопку закрыть расположил обсолютно -->
                                            <div class="new-popup__close">
                                                <img src="images/cancel.svg" alt="" onclick="newPopupClose()">
                                            </div>
                                            <!-- Кнопку обратно расположил обсолютно -->
                                            <div class="new-popup__back">
                                                <img src="images/back.svg" alt="" onclick="popupBack()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-popup-body">
                                        <div class="new-popup-body-title">Название</div>
                                        <div class="new-popup-body-input"><input type="text"></div>
                                        <div class="new-popup-body-title">Цвет</div>
                                        <div class="new-popup-body-colors df">
                                            <div class="color" style="background-color: #61bd50;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #f1d600;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #ff9f1a;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #eb5a47;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #c378e1;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #0079be;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #00c1e0;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #51e897;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #ff78cc;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                            <div class="color" style="background-color: #344563;">
                                                <img src="images/tick.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="new-popup-body-btn">
                                            <span>Создать</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup__description">
                            <div class="popup__description-top df">
                                <div class="popup__description-top-icon">
                                    <img src="images/product-description.svg" alt="">
                                </div>
                                <div class="popup__description-top-text">
                                    Описание
                                </div>
                            </div>
                            <div class="popup__description-bottom">
                                <div id="desc__area">
                                    <textarea class="autosize" placeholder="Добавить более подробное описание..."></textarea>
                                </div>
                                <div class="popup__description-bottom-save">
                                    <div class="save-btn">
                                        Сохранить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once('templates.php');
        ?>
        <!--ПОДКЛЮЧЕНИЕ JQUERY-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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