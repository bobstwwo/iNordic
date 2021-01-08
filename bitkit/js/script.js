$(document).ready(function () {
    makeAutoSize();
    $('.forhover').mouseenter(function () {
        $(this).next().css("opacity", "1");
    }).mouseleave(function () {
        $(this).next().css("opacity", "0");
    });

    $('.cards').sortable({
        connectWith: ".cards",
        cursor: "move",
        revert: true,
        tolerance: "pointer",
    });
    $('.columns').sortable({
        connectWith: ".columns",
        revert: true,
        scrollSpeed: 10000,
        cursor: "move",
        tolerance: "pointer",
        handle: ".column__top"
    });

    let with__plus = document.getElementById('with__plus').innerHTML;
    let element = document.getElementsByClassName('cards');
    if (typeof (element) != 'undefined' && element != null) {
        for (let i = 0; i < element.length; i++) {
            let par = $(element[i]).parent();
            $(par).append(with__plus);
        }
    }
});

function makeAutoSize() {
    autosize(document.getElementsByClassName("autosize"));
};

let with__textarea = document.getElementById('with__textarea').innerHTML;
let with__cancel = document.getElementById('with__cancel').innerHTML;
let with__plus = document.getElementById('with__plus').innerHTML;
let simple__card = document.getElementById('simple__card').innerHTML;

function addCard(el) {
    //ДОБАВЛЕНИЕ КАРТОЧКИ
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
            cancel();
        }
        else {
            text_area.focus();
            alert('Please, input title!');
        }
    });

}

//ОТМЕНА
function cancel() {
    let el = $('.new__card-btn').parent();
    let cards = el.parent();
    let prev = $(el).prev('.not__card');
    $(el).remove();
    $(prev).remove();
    $(cards).append(with__plus);
};
