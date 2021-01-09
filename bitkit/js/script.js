$(document).ready(function () {
    makeAutoSize();
    $('.forhover').mouseenter(function () {
        $(this).next().css("opacity", "1");
    }).mouseleave(function () {
        $(this).next().css("opacity", "0");
    });

    makeSortable();

    addBtnWithPlus();
});

//СДЕЛАТЬ КАРТОЧКИ И СПИСКИ СОРТИРУЕМЫМИ
function makeSortable() {
    $('.cards').sortable({
        connectWith: ".cards",
        cursor: "move",
        revert: true,
        tolerance: "pointer",
    });
    $('.columns').sortable({
        items: ".column",
        connectWith: ".columns",
        revert: true,
        scrollSpeed: 10000,
        cursor: "move",
        tolerance: "pointer"
        // handle: ".column__top"
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

//ПОЛУЧАЮ TEMPLATES
let with__textarea = document.getElementById('with__textarea').innerHTML;
let with__cancel = document.getElementById('with__cancel').innerHTML;
let with__plus = document.getElementById('with__plus').innerHTML;
let simple__card = document.getElementById('simple__card').innerHTML;
let with__plus__another = document.getElementById('with__plus-another').innerHTML;
let simple__column = document.getElementById('simple__column').innerHTML;

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
            let result = simple__column.replace('${text}', text_area.val());
            let where_to_insert = $($(this).parent()).parent();
            $(where_to_insert).before(result);
            cancel();
            addBtnWithPlus();
        }
        else {
            text_area.focus();
            alert('Please, input title!');
        }
    });
};

//POP-UP MENU ПРИ КЛИКЕ НА КАРТОЧКУ
function clickOnCard(el) {
    $('.popup').addClass('popup__open');

};
function popupClose() {
    $('.popup').removeClass('popup__open');
};

