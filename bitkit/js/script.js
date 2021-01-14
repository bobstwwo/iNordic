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
                    console.log(response);
                    console.log(textStatus);
                    console.log(jqXHR);
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
        connectWith: ".cards",
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
        if (text_area.val().length > 0) {
            let result = simple__card.replace('${text}', text_area.val());
            $('.new__card-btn').parent().siblings('.cards').append(result);
            cancel(1);
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
    $('.popup').addClass('popup__open');

};
function popupClose() {
    $('.popup').removeClass('popup__open');
};

//NEW_POPUP 
function newPopupOpen() {
    $('.new-popup').addClass('new-popup-open');
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
            console.log();
            for (let i = 0; i < data.length; i++) {
                let result = simple__column.replace('${text}', data[i][1]);
                result = result.replace('${num}', data[i][0]);
                $('.add__column').before(result);
            }
            makeSortable();
            addBtnWithPlus();
        },
        error: function (response) {
            alert('Ошибка в drawSavedColumns запросе!');
            console.log(response);
        }
    });
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
                    console.log(response);
                    console.log(textStatus);
                    console.log(jqXHR);
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
    arrID = arrID.filter(function(e){return e}); 
    console.log(arrID);
}

