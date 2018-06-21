<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 07.06.2018
 * Time: 12:18
 */

namespace App\Libraries\SafeCrow;


class SafeCrow
{
    private static $api_key = "d5bee1f1-b7ed-4cc5-bb55-c2985934b52d";
    private static $api_secret = "78b7062c109cc68e339e119577a2aa031c4daa76587633b1b9adee148d11e011";

    private static $prefix = "/api/v3";

    private static function sendPostCurl($json, $endpoint){
        $data = self::$api_key."POST".self::$prefix.$endpoint.json_encode($json);
        $hmac = hash_hmac("SHA256", $data, self::$api_secret);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://dev.safecrow.ru" . self::$prefix . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($json));
        curl_setopt($ch, CURLOPT_USERPWD, self::$api_key.':'.$hmac);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $body = curl_exec($ch)/* . "\n"*/;
        //print_r(curl_getinfo($ch));
        curl_close($ch);
        //echo "BODY: {$body}";
        return $body;
    }

    private static function sendGetCurl($endpoint){
        $data = self::$api_key."GET".self::$prefix.$endpoint;
        $hmac = hash_hmac("SHA256", $data, self::$api_secret);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://dev.safecrow.ru" . self::$prefix . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, self::$api_key.':'.$hmac);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $body = curl_exec($ch)/* . "\n"*/;
        //print_r(curl_getinfo($ch));
        curl_close($ch);
        //echo "BODY: {$body}";
        return $body;
    }

    public static function getKey(){
        return self::$api_key;
    }

    public static function getSecret(){
        return self::$api_secret;
    }

    public static function createUser($phone, $email, $firstName, $lastName){
        $json = [
            'phone' => $phone,
            'name' => $firstName.' '.$lastName,
            'email' => $email
        ];

        $endpoint = '/users';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function getUsers() {
        $endpoint = '/users';

        $body = self::sendGetCurl($endpoint);

        return $body;
    }

    public static function getUserIdByPhone($phone){
        $users = json_decode(self::getUsers());
        foreach ($users as $user){
            if($user->phone == $phone){
                return $user->id;
            }
        }
        return null;
    }

    public static function createDeal($consumer_id, $supplier_id, $price, $description){
        $json = [
            'consumer_id' => $consumer_id,
            'supplier_id' => $supplier_id,
            'price' => $price,
            'description' => $description,
            'service_cost_payer' => 'consumer'
        ];

        $endpoint = '/orders';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function addUserCard($user_id, $redirect_url){
        $json = [
            'redirect_url' => $redirect_url
        ];

        $endpoint = '/users/'.$user_id.'/cards';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function showUserCards($user_id){
        $endpoint = '/users/'.$user_id.'/cards';

        $body = self::sendGetCurl($endpoint);
        return $body;
    }

    public static function getOrder($id = null, $user_id = null){
        if($user_id == null){
            if($id == null) {
                $endpoint = '/orders';
            } else {
                $endpoint = '/orders/'.$id;
            }
        } else {
            $endpoint = '/users/'.$user_id.'/orders';
        }

        $body = self::sendGetCurl($endpoint);
        return $body;
    }

    public static function payOrder($order_id, $redirect_url){
        $json = [
            'redirect_url' => $redirect_url
        ];

        $endpoint = '/orders/'.$order_id.'/pay';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function closeOrder($order_id){
        $json = [
            'reason' => 'good'
        ];

        $endpoint = '/orders/'.$order_id.'/close';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function preAuth($order_id, $redirect_url){
        $json = [
            'redirect_url' => $redirect_url
        ];

        $endpoint = '/orders/'.$order_id.'/preauth';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function confirmPreAuth($order_id){
        $json = [
            'reason' => ''
        ];

        $endpoint = '/orders/'.$order_id.'/preauth/confirm';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function releasePreAuth($order_id){
        $json = [
            'reason' => 'Some reason',
        ];

        $endpoint = '/orders/'.$order_id.'/preauth/release';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function annulOrder($order_id, $reason){
        $json = [
            'reason' => $reason
        ];

        $endpoint = '/orders/'.$order_id.'/annul';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function cardPaySupplier($card_id, $user_id, $order_id){
        $json = [
            "supplier_payout_card_id" => $card_id
        ];

        $endpoint = '/users/'.$user_id.'/orders/'.$order_id;

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function escalateOrder($order_id, $reason){
        $json = [
            'reason' => $reason
        ];

        $endpoint = '/orders/'.$order_id.'/escalate';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static function callback(){
        $json = [
            'callback_url' => 'http://vsealaddin.ru/callback'
        ];

        $endpoint = '/settings';

        $body = self::sendPostCurl($json, $endpoint);
        return $body;
    }

    public static  function  callback_get(){
        $endpoint = '/settings';

        $body = self::sendGetCurl($endpoint);

        return $body;
    }
}