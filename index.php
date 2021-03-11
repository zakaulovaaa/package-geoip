<?php
require_once "vendor/autoload.php";
use GeoIp\GeoIp;
use GeoIp\Import\MaxmindTransformer;

//$ch = curl_init();

//phpinfo();


$urlMaxmind = "https://download.maxmind.com/app/geoip_download_by_token?edition_id=GeoLite2-City-CSV&date=20210309&suffix=zip&token=v2.local.zUw_ssM-iyxCqsG5SIX33rH7HJrQ0XiXTTaAG_FJWtZSk5d0SPYWJPUAs1aZpmKUOT4zKmM58hCdNUKu15MjBfcFJm0eWHgeUaXrXCrzfTVVEQDJkqiwtu0mNKHjnhbmgYIxuk1jwgX3rknJfjDbHKh2klWnnIKkhSwz0NsD7BJ71cbld-JuReNoZ0Mx2bkuJEvMhg";

if (empty($_GET)) {
    ?>
    <form action="">
        <input type="text" name="url" value="<?=$urlMaxmind?>"/>
        <button>начать</button>
    </form>
    <?php
} else {
    if (isset($_GET["url"])) {
        $dataSource = new MaxmindTransformer($_GET["url"]);
        $a = new GeoIp($dataSource);
        $a->dataInitialization();
    }

    ?>

    <?php
}
?>




