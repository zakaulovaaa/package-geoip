function visibleFormCity() {
    let block = document.getElementById("blockInfoCity");
    block.classList.remove("hidden")
}

function setTitleFormCity(num) {
    let numFormat = new Intl.NumberFormat('ru-RU').format(num);
    let title = document.getElementById("infoCityTitle");
    title.innerHTML = "В файле " + numFormat + " строк";
}

class GeoIp {
    constructor(urlAjax = "/test/ajax.php") {
        this.urlAjax = urlAjax;
    }

    initialRequest(data) {
        $.ajax({
            url: this.urlAjax,
            method: 'post',
            dataType: 'json',
            data: data,
            error: function (ans) {
                alert("ERROR")
            },
            success: function (ans) {
                setTitleFormCity(ans["size"]);
                visibleFormCity();
                console.log(ans);
            }
        });
    }

    batchLoad(data) {
        console.log(data);
        $.ajax({
            url: this.urlAjax,
            method: 'post',
            dataType: 'json',
            data: data,
            error: function (ans) {
                alert("ERROR")
            },
            success: function (ans) {
                console.log(ans);
            }
        });
    }



}