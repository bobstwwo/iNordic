// НАЧАЛА СКРИПТА
makeAutoSize();
$('.forhover').mouseenter(function () {
    $(this).next().css("opacity", "1");
}).mouseleave(function () {
    $(this).next().css("opacity", "0");
});

makeSortable();

addBtnWithPlus();

firstPage();

// НАЧАЛА СКРИПТА

//ПОЛУЧАЮ TEMPLATES
let with__textarea = document.getElementById('with__textarea').innerHTML;
let with__cancel = document.getElementById('with__cancel').innerHTML;
let with__plus = document.getElementById('with__plus').innerHTML;
let simple__card = document.getElementById('simple__card').innerHTML;
let with__plus__another = document.getElementById('with__plus-another').innerHTML;
let simple__column = document.getElementById('simple__column').innerHTML;
let add__board = document.getElementById('add__board').innerHTML;
let new__board = document.getElementById('new__board').innerHTML;
let listof__boards = document.getElementById('listof__boards').innerHTML;
let list__item = document.getElementById('list__item').innerHTML;
let popup__main = document.getElementById('popup__main').innerHTML;
let card__desc = document.getElementById('card__desc').innerHTML;
let mark_in_list = document.getElementById('mark_in_list').innerHTML;
let mark__tick = document.getElementById('mark__tick').innerHTML;
let popup__mark = document.getElementById('popup__mark').innerHTML;
let wrapper;
// Измение названия доски
function changeTitleOfBoard() {
    $('.board-title input').on('change', function () {
        let title = $('.board-title input').val();
        String.prototype.trim(title);
        if (title.length > 0) {
            let requestURL = 'http://localhost/iNordic/bitkit/api/change-title-board.php';
            const data = {
                "title": title
            }
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response, textStatus, jqXHR) {
                }
            });
        }
        else {
            alert('Поле ввода не может быть пустым!');
        }
    });
}

// Копка ДОСКИ 
function showListOfBoards() {
    wrapper = $('.wrapper').html();
    $('.wrapper').html(wrapper + listof__boards);
    let requestURL = 'http://localhost/iNordic/bitkit/api/list-of-boards.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            let rez = '';
            for (let i = 0; i < data.length; i++) {
                let result = list__item.replace('${list_title}', data[i][1]);
                result = result.replace('${list-bg}', data[i][2]);
                result = result.replace('${num}', data[i][0]);
                rez += result;
            }
            $('.list-all').html(rez);
        },
        error: function (response) {
            alert('Ошибка в showListOfBoards запросе!');
            console.log(response);
        }
    });
}
// закрыть ДОСКИ
function closeListOfBoards() {
    $('.wrapper').html(wrapper);
}

// Создание первой доски или загрузка last board
function firstPage() {
    let requestURL = 'http://localhost/iNordic/bitkit/api/response.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            if (data[5].length > 0) {
                // Рисую то что есть
                showNewBoard();
            }
            else {
                // Создаю доску
                $('.wrapper').html(add__board);
            }
        },
        error: function (response) {
            alert('Ошибка в firstPage запросе!');
        }
    });
}

// КНОПКА СОЗДАТЬ ДОСКУ
function addNewBoard() {
    let input = $('.add__inner-left-title input').val();
    let bg_color = $($('.tick-show').parent()).attr('style');
    bg_color = bg_color.split("'")[1];
    if (input.length > 0) {
        const body = {
            title: input,
            bg: bg_color
        }
        let requestURL = 'http://localhost/iNordic/bitkit/api/add-board.php?data=' + JSON.stringify(body);
        $.get(requestURL).then(() => {
            showNewBoard();
        });
    }
    else {
        alert('Поле ввода не может быть пустым!');
    }
}

// Показать другую доску
function showAnotherBoard(el) {
    let requestURL = 'http://localhost/iNordic/bitkit/api/another-board.php';
    let id = $(el).attr('far');
    const data = {
        "id": id
    }
    $.ajax({
        url: requestURL,
        type: "POST",
        data: data,
        success: function (response, textStatus, jqXHR) {
            if (response == "good") {
                showNewBoard();
            }
        }
    });
}

// Показать новую доску
function showNewBoard() {
    let requestURL = 'http://localhost/iNordic/bitkit/api/show-board.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            let account = data[0].charAt(0) + data[1].charAt(0);
            let result = new__board.replace('${name_surname}', account);
            result = result.replace('${board_title}', data[2]);
            document.getElementById('root').innerHTML = result;
            let bg = "url(" + data[3] + ")";
            $('#root').css({ 'background-image': bg });
        },
        error: function (response) {
            alert('Ошибка в showNewBoard запросе!');
            console.log(response);
        }
    }).then(() => {
        // ОТРИСОВКА УЖЕ ИМЕЮЩИХСЯ КОЛОНОК
        drawSavedColumns();
    });
}

// Закрыть add-popup
function addPopupClose() {
    $('.add__board-popup').css({ 'display': 'none' });
}
// Показать add-popup
function addPopupShow() {
    $('.add__board-popup').css({ 'display': 'flex' });
    $(document).mouseup(function (e) {
        var container = $('.add__inner');
        if (container.has(e.target).length === 0) {
            $('.add__board-popup').css({ 'display': 'none' });
        }
    });
}

// Показать галочку у bg-image
function bgImageTick(el) {
    let all_bg_images = document.getElementsByClassName('bg-image');
    for (let i = 0; i < all_bg_images.length; i++) {
        $(all_bg_images[i]).children().removeClass('tick-show');
    }
    $(el).children().addClass('tick-show');
    let bg_img = $(el).css("background-image");
    $('.add__inner-left').css({ "background-image": bg_img });
}

//Показать форму регистрации
function formReg() {
    $('#login').css({ 'display': 'none' });
    $('#reg').css({ 'display': 'block' });
};

//СДЕЛАТЬ КАРТОЧКИ И СПИСКИ СОРТИРУЕМЫМИ
function makeSortable() {
    $('.cards').sortable({
        receive: function (event, ui) {
            let column = $(this).closest('.column');
            let columnID = $(column).attr('far');
            let arrID = [];
            $(column).find('.card').each(function () {
                arrID.push($(this).attr('far'));
            });
            arrID = arrID.filter(function (e) { return e });
            const data = {
                "columnID": columnID,
                "data": arrID
            }
            let requestURL = 'http://localhost/iNordic/bitkit/api/save-position-cards.php';
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response, textStatus, jqXHR) {
                }
            });
        },
        remove: function (event, ui) {
            let column = $(this).closest('.column');
            let columnID = $(column).attr('far');
            let arrID = [];
            $(column).find('.card').each(function () {
                arrID.push($(this).attr('far'));
            });
            const data = {
                "columnID": columnID,
                "data": arrID
            }
            let requestURL = 'http://localhost/iNordic/bitkit/api/save-position-cards.php';
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response, textStatus, jqXHR) {
                }
            });
        },
        connectWith: ".cards",
        beforeStop: function (e) {
            savePositionCards(this);
        },
        // cursor: "move",
        revert: true,
        tolerance: "pointer",
    });
    $('.columns').sortable({
        items: ".column",
        connectWith: ".columns",
        beforeStop: function (e) {
            savePositionColumn(e);
        },
        revert: true,
        scrollSpeed: 10000,
        // cursor: "move",
        tolerance: "pointer",
    });
};

//ДОБАВЛЕНИЕ К СПИСКУ КНОПКУ ДОБАВИТЬ КАРТОЧКУ
function addBtnWithPlus() {
    let with__plus = document.getElementById('with__plus').innerHTML;
    let element = document.getElementsByClassName('cards');
    if (typeof (element) != 'undefined' && element != null) {
        for (let i = 0; i < element.length; i++) {
            let par = $(element[i]).parent();
            if (!$(par).children('div').last().hasClass('column__bottom')) {
                $(par).append(with__plus);
                makeSortable();
            }
        }
    }
}

//АВТОИЗМЕНЕНИЕ РАЗМЕРА TEXTARE
function makeAutoSize() {
    autosize(document.getElementsByClassName("autosize"));
};



//ДОБАВЛЕНИЕ КАРТОЧКИ
function addCard(el) {
    let parent = $(el).parent();
    $(el).replaceWith(with__textarea);
    $(parent).append(with__cancel);
    let text_area = $('.card__text-textarea');
    text_area.focus();
    makeAutoSize();
    $('.new__card-btn').click(function (e) {
        e.preventDefault();
        let id = $(this).parents('.column').attr('far');
        if (text_area.val().length > 0) {
            // ЗАПИСЬ В БД
            let requestURL = 'http://localhost/iNordic/bitkit/api/new-card.php';
            const data = {
                "title": text_area.val(),
                "id": id
            }
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response, textStatus, jqXHR) {
                    let result = simple__card.replace('${text}', text_area.val());
                    result = result.replace('${far}', response);
                    result = result.replace(/icon/i, '');
                    $('.new__card-btn').parent().siblings('.cards').append(result);
                    cancel(1);
                }
            });
        }
        else {
            text_area.focus();
            alert('Please, input title!');
        }
    });

}

/*
В переменную "addCardTmpl" записываю верствку "Добавить еще одну колонку" через метож addColumn(),  
для того чтобы потом мог вернуть ее при отмене(при нажатии на крестик)
*/
let addCardTmpl;
//ОТМЕНА
function cancel(numb) {
    if (numb == 1) {
        let el = $('.new__card-btn').parent();
        let cards = el.parent();
        let prev = $(el).prev('.not__card');
        $(el).remove();
        $(prev).remove();
        $(cards).append(with__plus);
    }
    else {
        $('.add__column-another').replaceWith(addCardTmpl);
    }
};

//ДОБАВЛЕНИЕ КОЛОНКИ
function addColumn(el) {
    addCardTmpl = el;
    $(el).replaceWith(with__plus__another);
    makeAutoSize();
    let text_area = $('.add__column-textarea textarea');
    text_area.focus();

    $('.new__column-btn').click(function (e) {
        e.preventDefault();
        if (text_area.val().length > 0) {
            // let result = simple__column.replace('${text}', text_area.val());
            // let where_to_insert = $($(this).parent()).parent();
            // $(where_to_insert).before(result);
            cancel();
            addBtnWithPlus();

            // Запоминаю в дазе данных
            saveNewColumn(text_area.val()).then(() => {
                //Отрисовка имеющихся колонок
                drawLastSavedColumn();
            })
        }
        else {
            text_area.focus();
            alert('Please, input title!');
        }
    });
};

// Запонимнание новой колонки
function saveNewColumn(text) {
    return new Promise((resolve, reject) => {
        let requestURL = 'http://localhost/iNordic/bitkit/api/new-column.php';
        const data = {
            "text": text
        }
        $.ajax({
            url: requestURL,
            type: "POST",
            data: data,
            success: function (response, textStatus, jqXHR) {
                resolve();
            }
        });
    })
}

//POP-UP MENU ПРИ КЛИКЕ НА КАРТОЧКУ
function clickOnCard(el) {
    makeAutoSize();
    let t = $(el).attr('far');
    let requestURL = 'http://localhost/iNordic/bitkit/api/get-card-info.php';
    const data = {
        "id": t
    }
    $.ajax({
        url: requestURL,
        type: "POST",
        data: data,
        success: function (response, textStatus, jqXHR) {
            let f_data = JSON.parse(response);
            let result = popup__main.replace('${title}', f_data[1]);
            if (f_data[2] != null) {
                result = result.replace('${desc}', f_data[2]);
            }
            else {
                result = result.replace('${desc}', '');
            }
            $('.popup__content').html(result);
            $('.popup').addClass('popup__open');
            makeAutoSize();
            let marks = f_data[4];
            if (marks != null) {
                const trg = {
                    marks: marks
                }
                showMarksOnPopUp(trg);
            }
        }
    });
};
function popupClose() {
    $('.popup').removeClass('popup__open');
};

//NEW_POPUP 
function newPopupOpen() {
    $('.new-popup').addClass('new-popup-open');
    createMarkCleacked();
};
function newPopupClose() {
    $('.new-popup').removeClass('new-popup-open');
};

//POPUP_BACK
function popupBack() {
    $('.fixed-marks').css({ 'display': 'block' });
    $('.create__new-mark').css({ 'display': 'none' });
    $('.new-popup').removeClass('change__popups');
}
//Create new mark
function createMark() {
    $('.fixed-marks').css({ 'display': 'none' });
    $('.create__new-mark').css({ 'display': 'block' });
    $('.new-popup').addClass('change__popups');
};

// ОТРИСОВКА УЖЕ ИМЕЮЩИХСЯ КОЛОНОК
function drawSavedColumns() {
    let requestURL = 'http://localhost/iNordic/bitkit/api/draw-saved-columns.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            let all_cards = "";
            for (let index = 0; index < Object.keys(data).length; index++) {
                if (data[index][2] == "") {
                    all_cards += data[index][2];
                } else {
                    all_cards += data[index][2];
                    all_cards += ",";
                }
            }
            if (all_cards == "") {
                for (let i = 0; i < data.length; i++) {
                    let result = simple__column.replace('${text}', data[i][1]);
                    result = result.replace('${num}', data[i][0]);
                    result = result.replace(/simp__card/i, '');
                    result = result.replace(/icon/i, '');
                    $('.add__column').before(result);
                }
                makeSortable();
                addBtnWithPlus();
            } else {
                drawSavedCards(all_cards).then((cards) => {
                    let f_data = JSON.parse(cards);
                    let count = 0;
                    for (let i = 0; i < Object.keys(data).length; i++) {
                        let result = simple__column.replace('${text}', data[i][1]);
                        result = result.replace('${num}', data[i][0]);
                        let cards_of_one_column = ' ';
                        let str = data[i][2].split(',');
                        if (str == '') {
                            let result = simple__column.replace('${text}', data[i][1]);
                            result = result.replace('${num}', data[i][0]);
                            result = result.replace(/simp__card/i, '');
                            result = result.replace(/icon/i, '');
                            $('.add__column').before(result);
                            makeSortable();
                            addBtnWithPlus();
                        } else {
                            for (let j = 0; j < str.length; j++) {
                                let card_id = f_data[count][0];
                                let card_title = f_data[count][1];
                                let card_descT = f_data[count][2];
                                let card_marks = f_data[count][3];
                                console.log(card_marks);
                                let simp_card = simple__card.replace('${far}', card_id);
                                simp_card = simp_card.replace('${text}', card_title);
                                if (card_descT != null) {
                                    simp_card = simp_card.replace(/icon/i, card__desc);
                                }
                                else {
                                    simp_card = simp_card.replace(/icon/i, '');
                                }
                                cards_of_one_column += simp_card;
                                count++;
                            }
                            result = result.replace(/simp__card/i, cards_of_one_column);
                            // ВЫВОД
                            $('.add__column').before(result);
                            makeSortable();
                            addBtnWithPlus();
                        }
                    }
                })
            }
        },
        error: function (response) {
            alert('Ошибка в drawSavedColumns запросе!');
            console.log(response);
        }
    });
}
// ОТРИСОВКА УЖЕ ИМЕЮЩИХСЯ КАРТОЧЕК
function drawSavedCards(cards) {
    return new Promise((resolve, reject) => {
        let requestURL = 'http://localhost/iNordic/bitkit/api/draw-saved-cards.php';
        const data = {
            "cards": cards
        }
        $.ajax({
            url: requestURL,
            type: "POST",
            data: data,
            success: function (response, textStatus, jqXHR) {
                resolve(response);
            }
        });
    })
}

//ОТРИСОВКА ПОСЛЕДНЕДОБАВЛЕННОЙ КОЛОНИК
function drawLastSavedColumn() {
    let requestURL = 'http://localhost/iNordic/bitkit/api/draw-lastadded-column.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            let result = simple__column.replace('${text}', data[1]);
            result = result.replace('${num}', data[0]);
            result = result.replace(/simp__card/i, '');
            $('.add__column').before(result);
            makeSortable();
            addBtnWithPlus();
        },
        error: function (response) {
            alert('Ошибка в drawSavedColumns запросе!');
            console.log(response);
        }
    });
}

// Измение названия колонки
function changeTitleOfColumn(el) {
    let textarea = el.querySelectorAll('#textarea');
    $(textarea).on('change', function () {
        let title = $(textarea).val();
        let id = $(el).closest('.column').attr('far');;
        String.prototype.trim(title);
        if (title.length > 0) {
            let requestURL = 'http://localhost/iNordic/bitkit/api/change-title-column.php';
            const data = {
                "title": title,
                "id": id
            }
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response, textStatus, jqXHR) {
                }
            });
        }
        else {
            alert('Поле ввода не может быть пустым!');
        }
    });
}

// Сохранение расположения колонок
function savePositionColumn(e) {
    let arr = document.getElementsByClassName('column');
    let arrID = [];
    for (let i = 0; i < arr.length; i++) {
        arrID.push($(arr[i]).attr('far'));
    }
    arrID = arrID.filter(function (e) { return e });
    const data = {
        "data": arrID
    }
    let requestURL = 'http://localhost/iNordic/bitkit/api/save-position-columns.php';
    $.ajax({
        url: requestURL,
        type: "POST",
        data: data,
        success: function (response, textStatus, jqXHR) {
        }
    });
}
// Сохранение расположения карточек
function savePositionCards(el) {
    let column = $(el).closest('.column');
    let columnID = $(column).attr('far');
    let arrID = [];
    $(column).find('.card').each(function () {
        arrID.push($(this).attr('far'));
    });
    arrID = arrID.filter(function (e) { return e });
    const data = {
        "columnID": columnID,
        "data": arrID
    }
    let requestURL = 'http://localhost/iNordic/bitkit/api/save-position-cards.php';
    $.ajax({
        url: requestURL,
        type: "POST",
        data: data,
        success: function (response, textStatus, jqXHR) {
        }
    });
}
// Измение названия карточки
function changeTitleOfCard() {
    $('.popup__title-textarea textarea').on('change', function () {
        let title = $(this).val();
        if (title.length > 0) {
            let requestURL = 'http://localhost/iNordic/bitkit/api/change-title-card.php';
            const data = {
                "title": title
            }
            $.ajax({
                url: requestURL,
                type: "POST",
                data: data,
                success: function (response) {
                    let id = JSON.parse(response);
                    let card = $("div").find(`[far='${id}']`)
                    let f_card = null;
                    for (let i = 0; i < card.length; i++) {
                        if ($(card[i]).hasClass('card')) {
                            f_card = card[i];
                        }
                    }
                    let r = f_card.querySelectorAll('.card__text span');
                    $(r).html(title);
                }
            });
        }
        else {
            alert('Поле ввода не может быть пустым!');
        }
    });
}
// Добавить комментарий
function addComment() {
    let text = $('#desc__area textarea').val();
    if (text.length > 0) {

        let requestURL = 'http://localhost/iNordic/bitkit/api/add-comment.php';
        const data = {
            "text": text
        }
        $.ajax({
            url: requestURL,
            type: "POST",
            data: data,
            success: function (response) {
                let id = JSON.parse(response);
                let card = $("div").find(`[far='${id}']`)
                let f_card = null;
                for (let i = 0; i < card.length; i++) {
                    if ($(card[i]).hasClass('card')) {
                        f_card = card[i];
                    }
                }
                if (!(f_card.innerHTML).includes('card__bottom')) {
                    $(f_card).html(f_card.innerHTML + card__desc);
                }
                popupClose();
            }
        });
    } else {
        alert('Поле ввода не может быть пустым!');
    }
}

// ВЫбор цвета метки
function colorClick(el) {
    let tick = '<img id="m-ticked" src="images/tick.svg" alt="">';
    let arr = document.getElementsByClassName('color');
    for (let index = 0; index < arr.length; index++) {
        $(arr[index]).html('');
    }
    // tick ставим
    $(el).html(tick);
}

// Создание новой метки
function newMark() {
    let val = $('.new-popup-body-input input').val();
    if (val.length > 0) {
        let color = '';
        let t = document.getElementById('m-ticked');
        color = $(t).closest('.color').css("background-color");

        const r4 = {
            "color": color,
            "text": val
        }
        $.ajax({
            url: 'http://localhost/iNordic/bitkit/api/add-new-mark.php',
            type: "POST",
            data: r4,
            dataType: 'json',
            success: function (t5y) {
                popupBack();
                createMarkCleacked();
            },
            error: function (response) {
                alert('Ошибка в newMark запросе!');
                console.log(response);
            }
        });
    } else {
        alert('Поле ввода не может быть пустым!');
    }
}

// Вывод списка меток
function createMarkCleacked() {
    let requestURL = 'http://localhost/iNordic/bitkit/api/get-all-marks.php';
    $.ajax({
        url: requestURL,
        contentType: 'application/json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            data.reverse();
            let ticked = data[0];
            let all_marks = '';
            for (let i = 1; i < Object.keys(data).length; i++) {
                let result = mark_in_list.replace('${title}', data[i][2]);
                result = result.replace('${color}', data[i][1]);
                result = result.replace('${far}', data[i][0]);
                if (ticked.includes(data[i][0])) {
                    result = result.replace(/tick/i, mark__tick);
                }
                else {
                    result = result.replace(/tick/i, '');
                }
                all_marks += result;
            }
            document.getElementById('new-popup-middle').innerHTML = all_marks;
        },
        error: function (response) {
            alert('Ошибка в newPopupOpen запросе!');
            console.log(response);
        }
    });
}

// Клик на метку в списке
function clickOnMarkInList(obj) {
    let count = $(obj).find('div').length;
    let farFrom = $(obj).parent().attr('farFrom');
    if (count == 1) {
        // Ставим галочку
        obj.innerHTML += mark__tick;
        funcHelder(farFrom, 'add');
    } else {
        // Убираем галочку
        let childs = $(obj).find('div');
        $(childs).last('div').remove();
        funcHelder(farFrom, 'remove');
    }
}
function funcHelder(farFrom, text) {
    let requestURL = 'http://localhost/iNordic/bitkit/api/get-card-info.php';
    return $.ajax({
        url: requestURL,
        type: "POST",
        dataType: "json",
        success: function (response) {
            let ticked = $(response).last()[0];
            if (text == 'add') {
                let tez = ticked += "," + farFrom;
                let data = {
                    "marks": tez,
                }
                showMarksOnPopUp(data);
            } else {
                let arr = ticked.split(',');
                let filteredArr = arr.filter(function (e) { return e !== farFrom });
                let str = '';
                for (let i = 0; i < filteredArr.length; i++) {
                    if (i + 1 == filteredArr.length) {
                        str += filteredArr[i];
                    }
                    else {
                        str += filteredArr[i] + ",";
                    }
                }
                console.log(str);
                let data = {
                    "marks": str,
                }
                showMarksOnPopUp(data);
            }
        }
    });
}


// Метод отрисовки меток при клике на карто в сплывающем окне
function showMarksOnPopUp(trg) {
    $.ajax({
        url: 'http://localhost/iNordic/bitkit/api/get-marks-with-tick.php',
        type: "POST",
        data: trg,
        success: function (re) {
            let n_data = JSON.parse(re);
            let ticked_marks_to_show = ' ';
            for (let q = 0; q < Object.keys(n_data).length; q++) {
                let rep = popup__mark.replace('${title}', n_data[q][2]);
                rep = rep.replace('${color}', n_data[q][1]);

                ticked_marks_to_show += rep;
            }
            document.querySelectorAll('.popup-mark').forEach(e => e.remove());
            $("#add__mark-btn").before(ticked_marks_to_show);
        }
    });
}