<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Main</title>
    <link href="css/main/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <?php 
        include($_SERVER['DOCUMENT_ROOT']."/iNordic/eshop/components/header/header.php");
    ?>
        <main>
            <div class="main-inner-h1">
                <h1>Новые поступления весны</h1>
            </div>
            <div class="main-inner-h5">
                <h5>Мы подготовили для Вас лучшие новинки сезона</h5>
            </div>
            <div class="main-inner-btn">
                <a href="#">посмореть новинки</a>
            </div>
            <div class="category">
                <div class="category-item big gb-fix" style="background-image: url('img/main/1.jpg');">
                    <div class="category-item-inner">
                        <div class="category-item-title">
                            джинсовые <br>
                            куртки
                        </div>
                        <div class="category-item-text">
                            New Arrival
                        </div>
                    </div>
                </div>
                <div class="category-item gb-fix" style="background-image: url('img/main/5.jpg');">
                </div>
                <div class="category-item" style="background-color: #bbbbbb;">
                    <div class="category-item-inner">
                        <div class="category-item-title lines">
                            <img src="img/main/no-bg-photo.png" alt="">
                        </div>
                        <div class="category-item-text">
                            каждый сезон мы подготавливаем для Вас исключительно лучшую модну одежду. Следит за нашими
                            новинками
                        </div>
                    </div>
                </div>
                <div class="category-item gb-fix" style="background-image: url('img/main/2.jpg');">
                    <div class="category-item-inner">
                        <div class="category-item-title">
                            джинсы
                        </div>
                        <div class="category-item-text">
                            от 3200 руб.
                        </div>
                    </div>
                </div>
                <div class="category-item" style="background-color: #606060;">
                    <div class="category-item-inner">
                        <div class="arrow">
                            <img src="img/main/arrow.png" alt="">
                        </div>
                        <div class="category-item-title">
                            Аксессуары
                        </div>
                    </div>
                </div>
                <div class="category-item gb-fix" style="background-image: url('img/main/3.jpg');">
                </div>
                <div class="category-item" style="background-color: #bbbbbb; ">
                    <div class="category-item-inner">
                        <div class="category-item-title lines">
                            <img src="img/main/no-bg-photo.png" alt="">
                        </div>
                        <div class="category-item-text">
                            Самые низкие цены в Москве. <br>
                            Нашли дешевле? Вернем разницу.
                        </div>
                    </div>
                </div>
                <div class="category-item gb-fix" style="background-image: url('img/main/6.jpg');">
                    <div class="category-item-inner">
                        <div class="category-item-title">
                            Спортивная
                            одежда

                        </div>
                        <div class="category-item-text">
                            от 590 руб.
                        </div>
                    </div>
                </div>
                <div class="category-item" style="background-color: #606060;">
                    <div class="category-item-inner">
                        <div class="arrow">
                            <img src="img/main/arrow.png" alt="">
                        </div>
                        <div class="category-item-title">
                            Элегантная <br>
                            обувь
                        </div>
                        <div class="category-item-text">
                            ботинки, кросовки
                        </div>
                    </div>
                </div>
                <div class="category-item big gb-fix" style="background-image: url('img/main/4.jpg');">
                    <div class="category-item-inner">
                        <div class="category-item-title">
                            детская <br>
                            одежда
                        </div>
                        <div class="category-item-text">
                            New Arrival
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-inner-h2">
                <h2>
                    будь всегда в курсе выгодных предложений
                </h2>
            </div>
            <div class="main-inner-h5-second">
                <h5>подписывайся и следи за новинками и выгодными предложениями.</h5>
            </div>
            <div class="main-inner-form">
                <form action="">
                    <div class="form">
                        <label>
                            <input placeholder="e-mail" type="text">
                        </label>
                    </div>
                    <div class="form-button">
                        записаться
                    </div>
                </form>
                <div class="form-feed">
                    Некорректный e-mail. Попробуйте еще раз.
                </div>
            </div>
        </main>
    <?php 
        include($_SERVER['DOCUMENT_ROOT']."/iNordic/eshop/components/footer/footer.php");
    ?>
    </div>
</body>

</html>