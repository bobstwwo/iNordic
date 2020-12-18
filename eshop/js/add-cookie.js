function addCookie() {
    let result;
    $.getJSON("files/cookie.json", function (data) {
        alert(date);
    });
    
    // $.ajax({
    //     url: "../system/actions/add-item.php",
    //     enctype: 'multipart/form-data',
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     type: "POST",
    //     dataType: "html",
    //     data: new FormData(form),
    //     success: function (result) {
    //         $('#result').html(result);
    //     },
    //     error: function (response) {
    //         $('#result').html('Ошибка. Данные не отправлены.');
    //     }
    // });
}