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
        <div class="wrapper">
            <div class="top df">
                <div class="top-left df">
                    <div class="boards hov">
                        <img id="header-gif" src="images/header.gif" alt="">
                        <span>Доски</span>
                    </div>
                    <div class="add hov" onclick="addPopupShow()">
                        <svg width="24" height="24" role="presentation" focusable="false" viewBox="0 0 24 24">
                            <path d="M12 3a1 1 0 00-1 1v7H4a1 1 0 100 2h7v7a1 1 0 102 0v-7h7a1 1 0 100-2h-7V4a1 1 0 00-1-1z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div class="top-middle">
                    <img id="header-logo" src="images/header-logo.png" alt="">
                </div>
                <div class="top-right df">
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
            <div class="add__board-popup">
                <div class="add__inner df">
                    <div class="add__inner-left" style="background-image: url('images/bg8.jpg')">
                        <div class="add__inner-left-title">
                            <input type="text" name="board-title" placeholder="Заголовок доски..">
                        </div>
                        <div class="add__board-popup-close" onclick="addPopupClose()">
                            <img src="images/cancel.svg" alt="">
                        </div>
                    </div>
                    <div class="add__inner-right df">
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg8.jpg')">
                            <img class="bg-image-tick tick-show" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg1.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg2.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg3.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg9.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg5.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg6.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                        <div onclick="bgImageTick(this)" class="bg-image" style="background-image:url('images/bg7.jpg')">
                            <img class="bg-image-tick" src="images/tick.svg" alt="">
                        </div>
                    </div>
                    <div class="add__new-board">
                        <span>Создать доску</span>
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
        <!-- ПОДКЛЮЧЕНИЕ AUTOSIZE -->
        <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    </body>

    </html>