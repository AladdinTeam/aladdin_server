<?php
/**
 * Created by PhpStorm.
 * User: v.v.alexeevich.95
 * Date: 20/06/2018
 * Time: 17:52
 */


class FactoryConst
{
    static $MastersCount = 2;
    static $ClientsCount = 2;
    static $OrdersCount = 2;
    static $ReportsCount = 2;

    static function getClients() {
        return self::$ClientsCount;
    }
}