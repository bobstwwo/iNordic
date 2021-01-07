$(document).ready(function () {
    autosize(document.getElementsByClassName("autosize"));

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
});