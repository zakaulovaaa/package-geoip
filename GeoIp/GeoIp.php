<?php

namespace GeoIp;

use GeoIp\Interfaces\DataProvider;
use GeoIp\Interfaces\DataSource;

class GeoIp {

//    /**
//     * @var DataProvider
//     */
//    protected $dataProvider;

    /**
     * @var DataSource
     */
    protected $dataSource;

    /**
     * GeoIp constructor.
//     * @param DataProvider $dataProvider
     * @param DataSource $dataSource
     */
    public function __construct(DataSource $dataSource)
    {
//        $this->dataProvider = $dataProvider;
        $this->dataSource = $dataSource;
    }

    public function dataInitialization() {

        var_dump($this->dataSource->initializationDataSource());

    }




}