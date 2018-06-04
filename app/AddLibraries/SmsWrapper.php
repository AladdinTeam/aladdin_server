<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 21.02.2018
 * Time: 12:04
 */

namespace App\AddLibraries;


class SmsWrapper
{
    public static function SenderSMS($phone, $message, $originator){
        $sender = new Sms();
        $sender->send($phone, $message, $originator);
    }
}