<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link href="css/main/style.css" rel="stylesheet">
    <link href="css/basket/style.css" rel="stylesheet">
    <link href="css/good/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <header>
            <?php
            include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/header/header.php");
            ?>
        </header>
        <main>
            <div class="basket-title">
                <h1> Ваша корзина</h1>
            </div>
            <div class="basket-text">
                <span>Товары резервируются на ограниченное время</span>
            </div>
            <div class="basket-goods">
                <div class="basket-goods-head">
                    <div class="basket-goods-head-left">
                        <div>
                            Фото
                        </div>
                        <div>
                            Наименование
                        </div>
                    </div>
                    <div class="basket-goods-head-right">
                        <div>Размер</div>
                        <div>Количество</div>
                        <div>Стоимость</div>
                        <div>Удалить</div>
                    </div>
                </div>
                <div class="basket-goods-items">
                    <?php
                    if ($_COOKIE != null) {
                        $str = implode('%', $_COOKIE);
                        $arr = explode('%', $str);
                        include($_SERVER['DOCUMENT_ROOT'] . '/iNordic/eshop/system/classes/Connection.php');
                        $count = sizeof($arr);
                        $total_price = 0;
                        for ($i = 0; $i < $count; $i++) {
                            $obj = new Connection();
                            $request = 'select * from all_men where id = ' . $arr[$i];
                            $line = mysqli_fetch_assoc($obj->getTable($request));
                            $total_price = $total_price + $line['price'];
                    ?>
                            <div class="basket-item">
                                <div class="item-left">
                                    <div class="item-photo">
                                        <img src="<?= $line['photo'] ?>" alt="">
                                    </div>
                                    <div>
                                        <div><?= $line['name'] ?></div>
                                        <div>Арт:123412</div>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <div>39</div>
                                    <div>1</div>
                                    <div><?= $line['price'] ?> руб.</div>
                                    <div class="delete"><img src="img/delete.png" alt=""></div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="total-price">
                    <div class="total-price-inner">
                        Итого: <span>12000 руб.</span>
                    </div>
                </div>
            </div>
            <div class="delivery">
                <div class="basket-title">
                    <h2>Адрес доставка</h2>
                </div>
                <div class="basket-text">
                    <span>Все поля обязательны для заполнения</span>
                </div>
                <div class="delivery-body">
                    <div class="delivery-body-text">Выберите варианты доставки</div>
                    <div class="list-down">
                        <div class="container">
                            <div class="dropdown">
                                <div class="select">
                                    <span>Курьерская служба - 500 руб.</span>
                                    <i class="fa fa-chevron-left"></i>
                                </div>
                                <input class="inp" type="hidden" name="gender">
                                <ul class="dropdown-menu">
                                    <li id="male">Другая служба доставки</li>
                                    <li id="female">Другая служба доставки</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="left-and-right">
                        <div class="delivery-body-left">
                            <div class="delivery-body-text">Имя</div>
                            <input type="text">
                        </div>
                        <div class="delivery-body-right">
                            <div class="delivery-body-text">Фамилия</div>
                            <input type="text">
                        </div>
                    </div>
                    <div class="address">
                        <div class="delivery-body-text">Адресс</div>
                        <input type="text">
                    </div>
                    <div class="left-and-right">
                        <div class="delivery-body-left">
                            <div class="delivery-body-text">Город</div>
                            <input type="text">
                        </div>
                        <div class="delivery-body-right">
                            <div class="delivery-body-text">Индекс</div>
                            <input type="text">
                        </div>
                    </div>
                    <div class="left-and-right">
                        <div class="delivery-body-left">
                            <div class="delivery-body-text">Телефон</div>
                            <input type="text">
                        </div>
                        <div class="delivery-body-right">
                            <div class="delivery-body-text">E-mail</div>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <div class="btn-inner">
                        Оставить заявку
                    </div>
                </div>
            </div>
        </main>
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/iNordic/eshop/components/footer/footer.php");
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/dropdown.js"></script>
</body>

</html>