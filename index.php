<link rel="stylesheet" href="static/css/style.css">

<?php
require_once "vendor/autoload.php";
use GeoIp\GeoIp;
use GeoIp\Import\MaxmindTransformer;

//$ch = curl_init();

//phpinfo();

//$urlMaxmind = "https://download.maxmind.com/app/geoip_download_by_token?edition_id=GeoLite2-City-CSV&date=20210309&suffix=zip&token=v2.local.zUw_ssM-iyxCqsG5SIX33rH7HJrQ0XiXTTaAG_FJWtZSk5d0SPYWJPUAs1aZpmKUOT4zKmM58hCdNUKu15MjBfcFJm0eWHgeUaXrXCrzfTVVEQDJkqiwtu0mNKHjnhbmgYIxuk1jwgX3rknJfjDbHKh2klWnnIKkhSwz0NsD7BJ71cbld-JuReNoZ0Mx2bkuJEvMhg";
//
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
<!---->
<!--    --><?php
//}
//?>
<div class="preloader_main" id="preloader">
    <div class="preloader">
        <div class="dot dot_1"></div>
        <div class="dot dot_2"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script src="dist/js/jquery.preloadinator.min.js"></script>-->
<script src="static/js/script.js"></script>
<script src="static/js/GeoIp.js"></script>
