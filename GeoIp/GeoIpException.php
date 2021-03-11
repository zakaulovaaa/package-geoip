<?php

class GeoIpNotUrlSourceException extends Exception {
    // Переопределим исключение так, что параметр message станет обязательным
    public function __construct($message, $code = 0, Throwable $previous = null) {
        // некоторый код

        // убедитесь, что все передаваемые параметры верны
        parent::__construct($message, $code, $previous);
    }

    // Переопределим строковое представление объекта.
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}