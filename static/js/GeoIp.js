function visibleDetailMaxmind() {
    let block = document.getElementById("block-maxmind-detail");
    block.classList.remove("hidden")
}

function setTitleForm(num, idName) {
    let numFormat = new Intl.NumberFormat('ru-RU').format(num);
    let title = document.getElementById(idName);
    title.innerHTML = "В файле " + numFormat + " строк";
}

function setNumPage(num, idForm) {
    let form = $("#" + idForm);
    let input = form.find("[name='numPage']");
    input.val(num);
}

function getFDByIdForm(idForm) {
    let str = $("#infoCity").serialize();
    return str;
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

     batchLoad() {
        let page = 1, cnt = 1;
        let that = this;

        while (page !== -1 && cnt < 7) {
            let data = getFDByIdForm("infoCity");
            cnt++;
            $.ajax({
                url: that.urlAjax,
                method: 'post',
                dataType: 'json',
                data: data,
                async: false,
                error: function (ans) {
                    alert("ERROR")
                },
                success: function (ans) {
                    if (ans["info"]["nextPage"] !== -1) {
                        setNumPage(ans["info"]["nextPage"], "infoCity");
                    }
                    page = ans["info"]["nextPage"];
                    console.log(ans)
                }
            });
            console.log(page);
        }

    }



}