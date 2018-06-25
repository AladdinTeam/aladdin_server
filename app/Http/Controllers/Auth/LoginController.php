<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 09.02.2018
 * Time: 14:09
 */

namespace App\Http\Controllers\Auth;


use App\Client;
use App\Http\Controllers\Controller;
use App\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\AddLibraries\Sms;

class LoginController extends Controller
{

    private function code_generation($count = 6){
        $code = "";
        for($i = 0; $i < $count; $i++) {
            $digit = random_int(0, 9);
            $code .= $digit;
        }
        return $code;
    }

    public function showForm(Request $request){
        return view("auth.login");
    }

    public function login(Request $request){
        $sender = new Sms();
        $validator = Validator::make($request->all(),
            [
                'user_type' => 'required',
                'phone' => 'required|min:17|max:17',
            ],
            [
                'user_type.required' => 'Выберите тип пользователя',
                'phone.required' => 'Введите корректный номер телефона',
                'phone.min' => 'Введите корректный номер телефона',
                'phone.max' => 'Введите корректный номер телефона'
            ]);
        $validator->validate();
        $phone = str_replace(['+', '(', ')', '-', ' '], [], $request->phone);
        if($request->user_type == 0){
            $user = Client::where("phone", $phone)->first();
        } else { //Мастер
            $user = Master::where("phone", $phone)->first();
        }
        if($user != null){
            $code = $this->code_generation();
            $user->update(['confirm_code' => $code]);
            $sender->send($request->phone, "You code for Aladdin auth is: ".$code, "Aladdin");
            session(['id' => Crypt::encryptString($user->id)]);
            session(['user_type' => Crypt::encryptString($request->user_type)]);
            return redirect('/confirm');
        } else {
            return redirect('/login')->with('unsuccess', 'Указанный номер не зарегистрирован, проверьте корректность номера');
        }
    }

    public function showFormConfirm(){
        /*echo session('id');
        echo Crypt::decryptString(session('id'));*/
        return view('auth.confirm');
    }

    public function confirm(Request $request){
        $sender = new Sms();
        $validator = Validator::make($request->all(),
            [
                'code' => 'required|digits:6',
            ],
            [
                'code.digits' => 'Некоректный код'
            ]);
        $validator->validate();
        if(Crypt::decryptString(session('user_type')) == 0){
            $user = Client::find(Crypt::decryptString(session('id')));
        } else { //Мастер
            $user = Master::find(Crypt::decryptString(session('id')));
        }
        if($user != null){
            if($user->confirm_code == $request->code){
                $user->update(['confirm_code' => null]);
                session(['auth' => Crypt::encryptString('1')]);
                if(($user instanceof Client) and session()->get('login_data') /*and session()->get('login_target')*/){
                    /*$target = session()->get('login_target');
                    switch ($target) {
                        case 'search/mini_order':*/
                            return redirect()->action('SearchController@saveOrder');
                    //}
                }
                return redirect('/orders');
            } else {
                $code = $this->code_generation();
                $user->update(['confirm_code' => $code]);
                $sender->send($request->phone, "You code for Aladdin auth is: " . $code, "Aladdin");
                return redirect('/confirm')->with('unsuccess', 'Неверный код');
            }
        } else {
            return redirect('/login')->with('unsuccess', 'Возникла ошибка, попробуйте ещё раз');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}