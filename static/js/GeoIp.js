function visibleDetailMaxmind() {
    let block = document.getElementById("block-maxmind-detail");
    block.classList.remove("hidden")
}

function setTitleForm(num, idName) {
    let numFormat = new Intl.NumberFormat('ru-RU').format(num);
    let title = document.getElementById(idName);
    title.innerHTML = "В файле " + numFormat + " строк";
}

function setNumPage(num, id) {

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
                setTitleForm(ans["city"]["size"], "infoCityTitle");
                setTitleForm(ans["ip"]["size"], "infoIpTitle");
                visibleDetailMaxmind();
                console.log(ans);
            }
        });
    }

    batchLoad(data) {
        $.ajax({
            url: this.urlAjax,
            method: 'post',
            dataType: 'json',
            data: data,
            error: function (ans) {
                alert("ERROR")
            },
            success: function (ans) {
                if (ans["info"]["nextPage"] !== -1) {

                }
                console.log(ans);
            }
        });
    }



}