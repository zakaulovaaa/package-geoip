<link rel="stylesheet" href="static/css/style.css">

<?php
require_once "vendor/autoload.php";
use GeoIp\GeoIp;
use GeoIp\Import\MaxmindTransformer;

//$list = list_files("/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/");


?>
<form id="initialForm">
    <input type="text" name="url" value="hello">
    <button id="submitForm">вперед</button>
</form>

<div class="block-maxmind-detail hidden" id="block-maxmind-detail">
    <div class="infoCity" id="blockInfoCity">
        <h2>City</h2>
        <h3 id="infoCityTitle">Всего найдено </h3>
        <form id="infoCity">
            <label>обрабатывать по </label>
            <input name="stepCount" type="number">
            <input name="numPage" type="number" value="1" class="hidden">
            <input name="type" type="text" value="city" class="hidden">
            <button id="submitFormInfoCity">работать</button>
        </form>
    </div>

    <div class="infoIp" id="blockInfoIp">
        <h2>IP</h2>
        <h3 id="infoIpTitle">Всего найдено </h3>
        <form id="infoIp">
            <label>обрабатывать по </label>
            <input name="stepCount" type="number">
            <input name="numPage" type="number" value="1" class="hidden">
            <input name="type" type="text" value="city" class="hidden">
            <button id="submitFormInfoIp">работать</button>
        </form>
    </div>
</div>




<?php

//$ch = curl_init();

//phpinfo();

//$urlMaxmind = "https://download.maxmind.com/app/geoip_download_by_token?edition_id=GeoLite2-City-CSV&date=20210309&suffix=zip&token=v2.local.zUw_ssM-iyxCqsG5SIX33rH7HJrQ0XiXTTaAG_FJWtZSk5d0SPYWJPUAs1aZpmKUOT4zKmM58hCdNUKu15MjBfcFJm0eWHgeUaXrXCrzfTVVEQDJkqiwtu0mNKHjnhbmgYIxuk1jwgX3rknJfjDbHKh2klWnnIKkhSwz0NsD7BJ71cbld-JuReNoZ0Mx2bkuJEvMhg";



//if (empty($_GET)) {
//    ?>
<!--    <form action="">-->
<!--        <input type="text" name="url" value="--><?//=$urlMaxmind?><!--"/>-->
<!--        <button>начать</button>-->
<!--    </form>-->
<!--    --><?php
//} else {
//    if (isset($_GET["url"])) {
//        $dataSource = new MaxmindTransformer($_GET["url"]);
//        $a = new GeoIp($dataSource);
//        $a->dataInitialization();
//    }
//
//    ?>
<!--    --><?php
//}
//?>
<!--<div class="preloader_main" id="preloader">-->
<!--    <div class="preloader">-->
<!--        <div class="dot dot_1"></div>-->
<!--        <div class="dot dot_2"></div>-->
<!--        <div class="dot dot_3"></div>-->
<!--    </div>-->
<!--</div>-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="dist/js/jquery.preloadinator.min.js"></script>-->
<script src="static/js/GeoIp.js"></script>
<script src="static/js/script.js"></script>

