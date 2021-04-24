<?php

namespace GeoIp\Import;

use GeoIp\Interfaces\DataProvider;
use GeoIp\Interfaces\DataSource;
use http\Exception;
use \ZipArchive;
use http\Client\Curl;


class MaxmindTransformer implements DataSource {

    private const ARCHIVE_NAME = "/db.zip";
    private const FOLDER_PARSE_NAME = "GeoLite2-City";

    protected string $url;
    private string $folderParseName;
    private string $temporaryDir;

    /**
     * MaxmindTransformer constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->temporaryDir = $_SERVER['DOCUMENT_ROOT'] . "/test/temporary-geoip";
    }

    function unzipData(): void {
        $zip = new ZipArchive();
        if ($zip->open($this->temporaryDir . self::ARCHIVE_NAME) === true) {
            $zip->extractTo($this->temporaryDir);
            $zip->close();
        } else {
            throw new \RuntimeException("failed to open archive<br>");
        }
    }

    function downloadData() : void {
        //check is empty url to data
        if ($this->url === "") {
            throw new \Exception("no link to download the database");
        }

        // create temporary dir
        if (!file_exists($this->temporaryDir)) {
            mkdir($this->temporaryDir, 0777, true);
        }

        //download data
        $file = fopen($this->temporaryDir . self::ARCHIVE_NAME, 'w');
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_exec($ch);
        curl_close($ch);
        fclose($file);

        //check is empty archive
        if (!filesize($this->temporaryDir . self::ARCHIVE_NAME)) {
            throw new \Exception("the archive was not downloaded");
        }
    }

    function downloadDataSource(): mixed
    {
        try {
//            $this->downloadData();
//            $this->unzipData();
            try {
//                $this->uploadCSV("/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/GeoLite2-City-Blocks-IPv4.csv");

                $fileCity = "/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/GeoLite2-City-Locations-ru.csv";
                $fileIp = "/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/GeoLite2-City-Blocks-IPv4.csv";
                return [
                    "city" => $this->getInfoData($fileCity),
                    "ip" => [
                        'size' => -10
                    ]
//                        $this->getInfoData($fileIp)
                ];
            } catch (\Exception $e) {
                var_dump("DASHAAA hello ");
            }

        } catch (\Exception $e) {
            echo $e;
            return false;
        }
        return true;
    }



    function uploadCSV($csvFile = '', $tableData = [], $filters = [], $reference = []) {
        $file = fopen($csvFile, 'r');

        $i = 0;
        $keys = [];
        $allData = [];
        $m = memory_get_usage();
        while (($data = fgetcsv($file)) !== false) {
            if ($i === 0) {
                $keys = $data;
            } else {
                $rowData = array_combine($keys, $data);
                foreach ($reference as $ref) {
                    $refData = call_user_func($ref['fn'][0], $rowData[$ref['fn'][1]]);

                    if (!empty($refData)) {
                        if (is_array($refData)) {
                            foreach ($refData as $refKey => $refVal) {
                                $rowData[$ref['r'][$refKey]] = $refVal;
                            }
                        } else {
                            $rowData[$ref['r']] = $refData;
                        }
                    }
                }
                $allData[] = $rowData;
            }
            $i++;
        }

        $m = memory_get_usage() - $m;

        fclose($file);
//        echo "<pre>";
//        echo $m . "<br>";
//        var_dump(count($allData));
//        var_dump($i);
//        echo "</pre>";
    }

    function getInfoData($csvFile = '') {
        $file = file($csvFile);
        $cnt = count($file);
        return [
            "size" => $cnt
        ];
    }

    function updateDataBase()
    {
        // TODO: Implement updateDataBase() method.
    }


    function uploadPieceOfDataCSV($csvFile = '', $sizeFile, int $left, int $right): array {
        $allData = [];

        $fileCSV = fopen($csvFile, 'r');
        $keys = fgetcsv($fileCSV);

//        for ($i = 1; $i <= min(($numPage - 1) * $step + 1, $sizeFile); $i++) {
//            fgets($fileCSV);
//        }
        for ($i = 1; $i <= $left; $i++) {
            fgets($fileCSV);
        }
//min($numPage * $step, $sizeFile)
        for ($i = $left + 1; $i <= $right; $i++) {
            $row = fgetcsv($fileCSV);
            $rowData = array_combine($keys, $row);
//            if ($i === $left + 1 || $i === $right - 1) {
                $allData[] = $rowData;
//            }
        }

        return $allData;
    }

    public function getPieceOfData(int $numPage, int $step, string $type): array
    {
        $fileCSV = "";
        if ($type === "city") {
            $fileCSV = "/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/GeoLite2-City-Locations-ru.csv";
        } elseif ($type === "ip") {
            $fileCSV = "/home/zakaulovaaa.ru/domain/main/test/temporary-geoip/GeoLite2-City-CSV_20210309/GeoLite2-City-Blocks-IPv4.csv";
        }

        $info = $this->getInfoData($fileCSV);
        $left = ($numPage - 1) * $step + 1;
        $right = min($step * $numPage, $info["size"]);
        if ($left >= $info["size"]) {
            return [];
        }
        $nextPage = $numPage + 1;

        if ($info["size"] <= $step * $numPage) {
            $nextPage = -1;
        }
        $data = $this->uploadPieceOfDataCSV($fileCSV, $info["size"], $left, $right);

        return [
            "data" => $data,
            "info" => [
                "nextPage" => $nextPage
            ]
        ];
    }



    // TODO: добавить функцию получения структуры данных из файликов
    // TODO: Установить соответстивия между: IPv4 -- файлы из архива
    // TODO: Установить соответстивия между: IPv6 -- файлы из архива
    // TODO: Установить соответстивия между: location -- файл из архива

}