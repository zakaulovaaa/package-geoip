<?php

namespace GeoIp\Interfaces;

interface DataSource {
    /**
     * @return bool  //true -- если в результате получения данных ошибок не возникло, иначе -- false
     */
    public function downloadDataSource(): mixed;

    /**
     * @param int $numPage
     * @param int $step
     * @return array
     */
    public function getPieceOfData(int $numPage, int $step): array;


    /**
     * @return mixed
     */
    function updateDataBase();

}