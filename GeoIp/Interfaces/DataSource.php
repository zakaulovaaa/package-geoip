<?php

namespace GeoIp\Interfaces;

interface DataSource {
    /**
     * @return bool  //true -- если в результате получения данных ошибок не возникло, иначе -- false
     */
    function initializationDataSource(): bool;

    // initializationDataSource ПЕРЕИМЕНОВАТЬ

    /**
     * @return mixed
     */
    function updateDataBase();

}