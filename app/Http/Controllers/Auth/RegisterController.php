<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 12.02.2018
 * Time: 13:02
 */

namespace App\Http\Controllers\Auth;


use App\Client;
use App\Http\Controllers\Controller;
use App\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\AddLibraries\Sms;

class RegisterController extends Controller
{
    private function code_generation($count = 6){
        $code = "";
        for($i = 0; $i < $count; $i++) {
            $digit = random_int(0, 9);
            $code .= $digit;
        }
        return $code;
    }

    public function showForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $phone = str_replace(['+', '(', ')', '-', ' '], [], $request->phone);
        if($request->user_type == 1){
            $user = Master::select("id")->where("phone", "=", $phone)->
            where("email", "=", mb_strtolower($request->email, 'UTF-8'), "or")->first();
        } else {
            $user = Client::select("id")->where("phone", "=", $phone)->
            where("email", "=", mb_strtolower($request->email, 'UTF-8'), "or")->first();
        }
        if($user == null) {
            $sender = new Sms();
            $code = $this->code_generation();
            $validator = Validator::make($request->all(),
                [
                    'user_type' => 'required',
                    'phone' => 'required|min:17|max:17',
                    'email' => 'required|email',
                    'first_name' => 'required|alpha',
                    'last_name' => 'required|alpha'
                ],
                [
                    'user_type.required' => 'Выберите тип пользователя',
                    'phone.required' => 'Введите телефон',
                    'phone.min' => 'Введите корректный номер телефона',
                    'phone.max' => 'Введите корректный номер телефона',
                    'email.required' => 'Введите e-mail',
                    'email.email' => 'Введите корректный e-mail',
                    'first_name.required' => 'Введите фамилию',
                    'first_name.alpha' => 'Введите корректную фамилию',
                    'last_name.required' => 'Введите имя',
                    'last_name.alpha' => 'Введите корректное имя'
                ]
            );
            $validator->validate();
            $phone = str_replace(['+', '(', ')', '-', ' '], [], $request->phone);
            if ($request->user_type == 1) {
                $id = Master::insertGetId([
                    "phone" => $phone,
                    "email" => mb_strtolower($request->email, 'UTF-8'),
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "confirm_code" => $code,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")
                ]);
            } else {
                $id = Client::insertGetId([
                    "phone" => $phone,
                    "email" => mb_strtolower($request->email, 'UTF-8'),
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "confirm_code" => $code,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")
                ]);
            }
            $sender->send($phone, "You code for Aladdin auth is: " . $code, "Aladdin");
            session(['id' => Crypt::encryptString($id)]);
            session(['user_type' => Crypt::encryptString($request->user_type)]);
            return redirect('/confirm');
        } else {
            return redirect('/registration')->with('unsuccess', "Данный пользователь уже зарегистрирован");
        }
    }
}