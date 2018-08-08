<?php

namespace App\Http\Controllers\Mobile;

use App\Client;
use App\Http\Controllers\Controller;
use App\Libraries\SafeCrow\SafeCrow;
use App\Master;
use App\Master_Info;
use Illuminate\Http\Request;
use App\AddLibraries\SmsWrapper;
use App\AddLibraries\ErrorCode;
use Illuminate\Support\Facades\Storage;

//TODO: Приделать отправление данных о пользователе при авторизации

class AuthorizationController extends Controller
{
    private function code_generation($count = 6){
        $code = "";
        for($i = 0; $i < $count; $i++) {
            $digit = random_int(0, 9);
            $code .= $digit;
        }
        return $code;
    }

    public function register(Request $request) {
        if($request->user_type == 1){
            $user = Master::select("id")->where("phone", $request->phone)->
            orWhere("email", "=", mb_strtolower($request->email, 'UTF-8'), "or")->first();
        } else {
            $user = Client::select("id")->where("phone", $request->phone)->
            orWhere("email", "=", mb_strtolower($request->email, 'UTF-8'), "or")->first();
        }
        if ($user == null) {
            if($request->user_type == 1){

                $safeCrowID = SafeCrow::getUserIdByPhone($request->phone);
                if ($safeCrowID == null) {
                    $safeCrowBody = json_decode(SafeCrow::createUser($request->phone, $request->email, $request->first_name, $request->last_name));
                    $safeCrowID = $safeCrowBody->id;
                }

                $user = Master::create([
                    "phone" => $request->phone,
                    "email" => mb_strtolower($request->email, 'UTF-8'),
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "sc_id" => $safeCrowID
                ]);

                Master_Info::insert([
                    'master_id' => $user->id
                ]);
            } else {
                $user = Client::create([
                    "phone" => $request->phone,
                    "email" => mb_strtolower($request->email, 'UTF-8'),
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                ]);
            }
            $code = $this->code_generation();
            SmsWrapper::SenderSMS($request->phone, "You code for Aladdin auth is: ".$code, "Aladdin");
            $user->update(["confirm_code" => $code]);
            return response()->json(
                ErrorCode::sendStatus(ErrorCode::CODE_1)
            );
        } else {
            if(($user->phone == $request->phone) && ($user->email == $request->email)) {
                return response()->json(
                    ErrorCode::sendStatus(ErrorCode::CODE_2)
                );
            } elseif ($user->phone == $request->phone) {
                return response()->json(
                    ErrorCode::sendStatus(ErrorCode::CODE_3)
                );
            } else {
                return response() -> json(
                    ErrorCode::sendStatus(ErrorCode::CODE_4)
                );
            }
        }
    }

    public function login(Request $request){
        if($request->user_type == 1){
            $user = Master::where('phone', $request->phone)->first();
        } else {
            $user = Client::where('phone', $request->phone)->first();
        }
        if($user != null) {
            $code = $this->code_generation();
            SmsWrapper::SenderSMS($request->phone, "You code for Aladdin auth is: ".$code, "Aladdin");
            $user->update(["confirm_code" => $code]);
            return response()->json(
                ErrorCode::sendStatus(ErrorCode::CODE_1)
            );
        } else {
            return response()->json(
                ErrorCode::sendStatus(ErrorCode::CODE_5)
            );
        }
    }

    public function confirm(Request $request){
        if($request->user_type == 1){
            $user = Master::where('phone', $request->phone)->first();
        } else {
            $user = Client::where('phone', $request->phone)->first();
        }
        if($user != null){
            if($user->confirm_code == $request->code) {
                $token = bcrypt($this->code_generation());
                $user->update(["confirm_code" => null, "token" => $token,
                    "token_until" => date('Y-m-d H:i:s',(strtotime(date("Y-m-d H:i:s"))+86400*5))]);
                $user_arr = $user->toArray();
                return response()->json(
                    array_merge(
                        ErrorCode::sendStatus(ErrorCode::CODE_1),
                        [
                            "token" => $token,
                            "user" => $user_arr
                        ]
                    )
                );
            } else {
                $code = $this->code_generation();
                SmsWrapper::SenderSMS($user->phone, "You code for Aladdin auth is: ".$code, "Aladdin");
                $user->update(["confirm_code" => $code]);
                return response()->json(
                    array_merge(
                        ErrorCode::sendStatus(ErrorCode::CODE_6),
                        [
                            "token" => null,
                            "user" => null
                        ]
                    )
                );
            }
        } else {
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_5),
                    [
                        "token" => null,
                        "user" => null
                    ]
                )
            );
        }
    }

    public function token(Request $request){
        if($request->user_type == 1){
            $user = Master::where("token", $request->token)->first();
        } else {
            $user = Client::where("token", $request->token)->first();
        }
        if ($user != null) {
            if (($user->token == $request->token) and ($user->token_until > date("Y-m-d H:i:s"))) {
                $token = bcrypt($this->code_generation());
                $user->update(["confirm_code" => null, "token" => $token,
                    "token_until" => date('Y-m-d H:i:s', (strtotime(date("Y-m-d H:i:s")) + 86400 * 5))]);

                if ($request->user_type == 1) {
                    $avatar_url = null;
                    $avatarPhoto = $user->photos()->where('is_avatar', 1)->first();
                    if ($avatarPhoto != null) {
                        $avatar_url = asset(Storage::url($avatarPhoto->name));
                    }
//                    $avatar_url = asset(Storage::url($user->photos()->where('is_avatar', 1)->first()->name));
                    $subcategories = $user->subcategories()->select('name', 'image_url')->get()->toArray();
                    $masterSubways = $user->subways()->get();
                    $masterServices = $user->services()->get();
                    $masterInfo = $user->master_info()->first()->toArray();
                    $user_arr = array_merge(
                        $user->toArray(),
                        ["avatar_url" => $avatar_url],
                        ["subcategories" => $subcategories],
                        ["subways" => $masterSubways],
                        ["prices" => $masterServices],
                        ["master_info" => $masterInfo]);
                }

                return response()->json(
                    array_merge(
                        ErrorCode::sendStatus(ErrorCode::CODE_1),
                        [
                            "token" => $token,
                            "user" => $user_arr
                        ]
                    )
                );
            } else {
                $user->update(["token" => null, "token_until" => null]);
                return response()->json(
                    array_merge(
                        ErrorCode::sendStatus(ErrorCode::CODE_7),
                        [
                            "token" => null,
                            "user"=>null
                        ]
                    )
                );
            }
        } else {
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_5),
                    [
                        "token" => null,
                        "user"=>null
                    ]
                )
            );
        }
    }

    private function getUserJson($request) {
        $master = Master::find($request->id);
        $masterArray = $master->toArray();
        $subcategories = $master->subcategories()->select('name', 'image_url')->get()->toArray();
        $masterSubways = $master->subways()->get();

        $masterArray = array_merge($masterArray, ["subcategories" => $subcategories], ["subways" => $masterSubways]);

        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["master" => $masterArray]
            )
        );
    }

    public function change(Request $request){
        /**
         * Параметры запроса: user_type -- тип пользователя, email -- e-mail пользователя
         *
         * Параметры ответа: status -- код ошибки, id -- найденный идентификатор пользователя, error -- сообщение
         * об ошибке
         *
         * Коды ошибок: 1 -- пользователь найден, -1 -- пользователь не найден
         *
         * Метод принимает параметры из запроса и, в соответствии с user_type, ищет пользователя с указанным email
         * в таблице, сли такой пользователь найден отправлется ответ на запрос содержащий status = 1, id = найденный id,
         * error = "OK", а также пользователю на указанный email отправляется письмо с кодом для восстановления доступа
         * если соответствующего пользователя не найдено отправляется status = -1, id = null, error = "User not found"
         */
        if($request->user_type == 1){
            $user = Master::where($request->email)->first();
        } else {
            $user = Client::where($request->email)->first();
        }
        if($user != null){
            $code = $this->code_generation();
            $user->update(["email_code" => $code]);
            // TODO: Сделать отправку электронного письма с кодом
            //return response()->json(["status" => 1, "id" => $user->id, "error" => "OK"]);
            echo json_encode(["status" => 1, "id" => $user->id, "error" => "OK"]);
        } else {
            //return response()->json(["status" => -1, "id" => null, "error" => "User not found"]);
            echo json_encode(["status" => -1, "id" => null, "error" => "User not found"]);
        }
    }

    public function set(Request $request){
        /**
         * Параметры запроса: user_type -- тип пользователя, id -- идентификатор пользователя,
         * phone -- новый телефон, code -- код из письма
         *
         * Параметры ответа: status -- код ошибки, error -- сообщение об ошибке
         *
         * Код ошибки: 1 -- Код совпал, 0 -- код не совпал, -1 -- пользователь не найден
         *
         * Метод принимает параметры из завпроса, ищет пользщователя с указанным id, в соответствии с указанным
         * user_type и сравнивает значения кода подтверждения из запроса и из БД, если они совпадают, из БД стирается
         * код подтверждения и обновляется телефонный номер в ответ отправляется status = 1, error = "OK", если не
         * совпадают, то в ответ отправляется status = 0, error = "Wrong code". Если же по указанному id е удалось
         * найти пользователя в БД, то в ответ отправляется status = -1 и error = "User not found"
         */
        if($request->user_type == 1){
            $user = Master::find($request->id);
        } else {
            $user = Client::find($request->id);
        }
        if($user != null){
            if($user->email_code == $request->code){
                $user->update(["phone" => $request->phone, "email_code" => null]);
                return response()->json(["status" => 1, "error" => "OK"]);
            } else {
                return response()->json(["status" => 0, "error" => "Wrong code"]);
            }
        } else {
            return response()->json(["status" => -1, "error" => "User not found"]);
        }
    }
}