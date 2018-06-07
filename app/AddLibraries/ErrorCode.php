<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 20.02.2018
 * Time: 12:10
 */

namespace App\AddLibraries;


class ErrorCode
{
    const STATUS_FIELD = "status";
    const ERROR_FIELD = "error";
    const CODE_1 = ["code" => 1, "message" => "OK"]; //Всё хорошо
    const CODE_2 = ["code" => 2, "message" => "User with this phone and email already registered"]; //Пользователь с таким телефоном и email уже зрегистрирован
    const CODE_3 = ["code" => 3, "message" => "User with this phone already registered"]; //Пользователь с таким телефоном уже зрегистрирован
    const CODE_4 = ["code" => 4, "message" => "User with this email already registered"]; //Пользователь с таким email уже зрегистрирован
    const CODE_5 = ["code" => 5, "message" => "User not found"]; //Пользователь не найден
    const CODE_6 = ["code" => 6, "message" => "Code not match"]; //Код не совпадает
    const CODE_7 = ["code" => 7, "message" => "Invalid token"]; //Токен не совпадает или просрочен
    const CODE_8 = ["code" => 8, "message" => "Category not found"];
    const CODE_9 = ["code" => 9, "message" => "No category selected"];
    const CODE_10 = ["code" => 10, "message" => "Test not found"];
    const CODE_11 = ["code" => 11, "message" => "Photo not found"];
    const CODE_12 = ["code" => 12, "message" => "Wrong type of file"];
    const CODE_13 = ["code" => 13, "message" => "Subway station not found"]; //Станции метро не найдены
    const CODE_14 = ["code" => 14, "message" => "Not all fields filled"];
    const CODE_15 = ["code" => 15, "message" => "Services not found"];
    const CODE_16 = ["code" => 16, "message" => "Passport photo empty"]; //Нет фото пасспорта
    const CODE_17 = ["code" => 17, "message" => "Order with this id not found"]; //Отсутствует заказ с таким id.

    /*const CODE_2 = "User already register";
    const CODE_3 = "Invalid phone";
    const CODE_4 = "Invalid token";
    const CODE_5 = "Category not found";
    const CODE_6 = "Overdue token";
    const CODE_7 = "No category selected";*/

    public static function sendStatus($code){
        return [
            ErrorCode::STATUS_FIELD => $code['code'],
            ErrorCode::ERROR_FIELD => $code['message']
        ];
    }
}