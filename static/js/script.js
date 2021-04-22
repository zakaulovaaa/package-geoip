let preloader = document.getElementById("preloader");

let page = 1;

const btnForm1 = document.getElementById("submitForm");

// console.log(btnForm1)

btnForm1.onclick = (event) => {
    event.preventDefault();
    let form = $("#initialForm").serialize();

    let geoIp = new GeoIp();
    console.log(form);
    geoIp.initialRequest(form);
}

// ajaxRequest(page);

// function ajaxRequest(page) {
    // $.ajax({
    //     url: 'http://dev-hack.zakaulovaaa.ru/',
    //     method: 'post',
    //     dataType: 'json',
    //     data: {
    //         "page": page
    //     },
    //     success: function (data) {
    //         console.log(data["tmpPage"])
    //         if (data["nextPage"] !== -1) {
    //             ajaxRequest(page + 1);
    //         } else {
    //             preloader.classList.add("hidden")
    //         }
    //     }
    // })
// }

