
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
                alert("!!")
                console.log(ans)
            }
        })
    }

}