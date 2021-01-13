<template id="with__plus">
    <div class="column__bottom df" onclick="addCard(this)">
        <div class="column__bottom-plus">
            <img src="images/plus.svg" alt="">
        </div>
        <div class="column__bottom-text">
            Добавить карточку
        </div>
    </div>
</template>
<template id="with__cancel">
    <div class="new__card df">
        <div class="new__card-btn">
            Добавить карточку
        </div>
        <div class="new__card-cancel" onclick="cancel(1)">
            <img src="images/cancel.svg" alt="">
        </div>
    </div>
</template>
<template id="with__textarea">
    <div class="card not__card">
        <div class="df">
            <div class="card__text">
                <span>
                    <textarea class="card__text-textarea autosize" placeholder="Введите заголовок для этой карточки"></textarea>
                </span>
            </div>
        </div>
    </div>
</template>
<template id="simple__card">
    <div class="card" onclick="clickOnCard(this)">
        <div class="card__top">
        </div>
        <div class="df">
            <div class="card__text">
                <span>
                    ${text}
                </span>
            </div>
            <div class="card__pencil">
                <img src="images/pencil.svg" alt="">
            </div>
        </div>
    </div>
</template>
<template id="simple__column">
    <div class="column">
        <div class="column__top df">
            <div class="column__top-title">
                <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
                <textarea class="autosize" onclick="this.select()" id="textarea">${text}</textarea>
            </div>
            <div class="column__top-menu">
                <img src="images/dots.svg" alt="">
            </div>
        </div>
        <div class="cards">
        </div>
    </div>
</template>
<template id="with__plus-another">
    <div class="add__column-another">
        <div class="add__column-textarea">
            <textarea class="autosize" placeholder="Введите заголовок списка"></textarea>
        </div>
        <div class="new__card df">
            <div class="new__column-btn">
                Добавить список
            </div>
            <div class="new__card-cancel" onclick="cancel()">
                <img src="images/cancel.svg" alt="">
            </div>
        </div>
    </div>
</template>
<template id="add__board">
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
            <div class="add__new-board" onclick="addNewBoard()">
                <span>Создать доску</span>
            </div>
        </div>
    </div>
</template>
<template id="new__board">
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
                ${name_surname}
            </div>
        </div>
    </div>
    <div class="pre-top df">
        <div class="menu hov">
            <img id="dots" src="images/dots.svg" alt="">
            <span>Меню</span>
        </div>
        <div class="board-title">
            ${board_title}
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
    <div class="add__board-popup" style="display: none;">
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
            <div class="add__new-board" onclick="addNewBoard()">
                <span>Создать доску</span>
            </div>
        </div>
    </div>
</template>