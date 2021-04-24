<?php
require_once "vendor/autoload.php";
use GeoIp\GeoIp;
use GeoIp\Import\MaxmindTransformer;

function getBodyPostRequest()
{
    if(!empty($_POST))
    {
        return $_POST;
    }

    $post = [];
    try {
        $post = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
    }
    if(json_last_error() === JSON_ERROR_NONE)
    {
        return $post;
    }
    return $post;
}

$bodyRequest = getBodyPostRequest();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dataSource = new MaxmindTransformer($bodyRequest["url"] ?? "");
$a = new GeoIp($dataSource);

if (isset($bodyRequest["type"]) && $bodyRequest["type"] === "city") {
    $data = $a->getPieceOfData($bodyRequest["numPage"], $bodyRequest["stepCount"], $bodyRequest["type"]);

    echo json_encode($data);

} else {
    $ans = $a->downloadDataSource();
    echo json_encode($ans);
}







