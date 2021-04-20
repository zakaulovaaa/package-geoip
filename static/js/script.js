

// $('.js-preloader').preloadinator();
//
// $('.js-preloader').preloadinator({
//     scroll:false
// });
// $('.js-preloader').preloadinator({
//     minTime: 2000
// });
// $('.js-preloader').preloadinator({
//     animation:'fadeOut',
//     animationDuration: 400
// });

let preloader = document.getElementById("preloader");

let page = 1;

// ajaxRequest(page);

function ajaxRequest(page) {
    $.ajax({
        url: 'http://dev-hack.zakaulovaaa.ru/',
        method: 'post',
        dataType: 'json',
        data: {
            "page": page
        },
        success: function (data) {
            console.log(data["tmpPage"])
            if (data["nextPage"] !== -1) {
                ajaxRequest(page + 1);
            } else {
                preloader.classList.add("hidden")
                alert("ура")
            }
        }
    })
}

