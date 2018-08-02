<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 20.02.2018
 * Time: 10:47
 */

namespace App\Http\Controllers\Mobile\Master;


use App\Category;
use App\Http\Controllers\Controller;
use App\AddLibraries\ErrorCode;
use App\Master;
use App\Master_Info;
use App\PassportPhoto;
use App\Photo;
use App\Service;
use App\Subway;
use App\Test;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    const UPLOAD_FILE_NAME = 'test_jpg';
    const UPLOAD_IMAGE_MIME_TYPE = ['image/jpeg', 'image/png'];
    const MAX_VERIFICATION_STATUS = 5;

    public function __construct()
    {

    }

    public function getCategory(){
        $categories = Category::all();
        if($categories != null) {
            $cat = null;
            for ($i = 0; $i < count($categories); $i++) {
                $cat[] = [
                    "id" => $categories[$i]->id,
                    "name" => $categories[$i]->name,
                    "image_url" => $categories[$i]->image_url,
                    "sub_categories" => $categories[$i]->subcategories
                ];
            }
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_1),
                    ["categories" => $cat]
                )
            );
        } else {
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_8),
                    ["categories" => null]
                )
            );
        }
    }

    public function setCategory(Request $request){
        $subcategories = $request->subcategories;
        if($subcategories != null){
            $master = Master::find($request->master_id);
            $collect = $master->subcategories();
            $collect->sync($subcategories);
            if($master->verification_status == 1){
                $master->increment('verification_status');
            }
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
        } else {
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_9));
        }
    }

    public function getTest(){
        $tests = Test::all();
        if($tests != null) {
            $questions = [];
            for ($i = 0; $i < count($tests); $i++) {
                $answer = [
                    0 => $tests[$i]->answer1,
                    1 => $tests[$i]->answer2,
                    2 => $tests[$i]->answer3
                ];
                $questions[] = [
                    'question' => $tests[$i]->question,
                    'answers' => $answer,
                    'true_answer' => $tests[$i]->correct_answer,
                    'explanation' => $tests[$i]->explanation
                ];

            }
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_1),
                    ["questions" => $questions]
                )
            );
        } else {
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_10),
                    ["questions" => null]
                )
            );
        }
    }

    public function setTest(Request $request){
        $master = Master::find($request->master_id);
        if($master->verification_status == 0){
            $master->increment('verification_status');
        }
        return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
    }

    public function setMainInfo(Request $request){
        $master = Master::find($request->master_id);
        $master_info = Master_Info::where('master_id', $request->master_id);
        $master_info->update(['birthdate' => date("Y-m-d H:i:s", strtotime($request->birthdate))]);
        $master->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
        if($master->verification_status == 2){
            $master->increment('verification_status');
        }
        return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
    }

    public function getSubway(){
        $subways = Subway::all();
        if($subways != null) {
            $subway_station = [];
            for ($i = 0; $i < count($subways); $i++) {
                $subway_station[] = ['id' => $subways[$i]->id, 'name' => $subways[$i]->name];
            }
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_1),
                    ['subway_station' => $subway_station]
                )
            );
        } else {
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_13),
                    ['subway_station' => null]
                )
            );
        }
    }

    public function subwayInfo(Request $request){
        $subways = $request->subways;
        if(($subways != null) or ($request->experience == null) or ($request->education == null)
                or ($request->about == null)){
            $master = Master::find($request->master_id);
            $collect = $master->subways();
            $collect->sync($subways);
            $master_info = Master_info::where('master_id', $request->master_id);
            $master_info->update([
                'experience' => $request->experience,
                'education' => $request->education,
                'about' => $request->about
            ]);
            if($master->verification_status == 3){
                $master->increment('verification_status');
                $master->increment('verification_status');
            }
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
        } else {
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_14));
        }
    }

    public function aboutPriceSale(Request $request){
        $services = $request->services;
        if($services != null){
            for($i = 0; $i < count($services); $i++) {

                Service::create([
                    'master_id' => $request->master_id,
                    'name' => $services[$i]['name'],
                    'price' => $services[$i]['price'],
                    'unit' => ""
                ]);
            }

            $master_info = Master_Info::where('master_id', $request->master_id);
            $master_info->update([
                'sale' => $request->sales
            ]);
            $master = Master::find($request->master_id);
            if($master->verification_status == 4){
                $master->increment('verification_status');
            }
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
        } else {
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_15));
        }
    }

    public function uploadPhoto(Request $request){
        if($request->hasFile(VerifyController::UPLOAD_FILE_NAME)){
            $file = $request->file(VerifyController::UPLOAD_FILE_NAME);
            $type = $file->getMimeType();
            if(in_array($type, VerifyController::UPLOAD_IMAGE_MIME_TYPE)){
                if($request->isAvatar == 1){
                    $name = $file->store('public/'.$request->master_id);
                    $avatar = Photo::select('id')->where('master_id', $request->master_id)->where('is_avatar', '=', 1, 'and')->first();
                    if($avatar != null){
                        $avatar->update(["is_avatar" => 0]);
                    }
                    Photo::create(
                        [
                            "master_id" => $request->master_id,
                            "name" => $name,
                            "is_avatar" => 1
                        ]
                    );
                    return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
                } elseif ($request->isDocument == 1){
                    $name = $file->store('public/'.$request->master_id);
                    Photo::create(
                        [
                            "master_id" => $request->master_id,
                            "name" => $name,
                            "is_document" => 1
                        ]
                    );
                    return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
                } elseif($request->isPassport == 1) {
                    $name = $file->store('pass/'.$request->master_id);
                    PassportPhoto::create(
                        [
                            "master_id" => $request->master_id,
                            "name" => $name,
                        ]
                    );
                    $master = Master::find($request->master_id);
                    if($master->verification_status == 5){
                        $master->increment('verification_status');
                    }
                    return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
                } else {
                    $name = $file->store('public/'.$request->master_id);
                    Photo::create(
                        [
                            "master_id" => $request->master_id,
                            "name" => $name,
                        ]
                    );
                    return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
                }
            } else {
                return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_12));
            }

        } else {
            if($request->isPassport == 1){
                $master = Master::find($request->master_id);
                if($master->verification_status == 5){
                    $master->increment('verification_status');
                }
                return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_16));
            } else {
                return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_11));
            }
        }
    }

    public function callTime(Request $request){
        $master = Master::find($request->master_id);
        if($master != null){
            $master->update(
                [
                    'call_time' => date("Y-m-d H:i:s", strtotime($request->call_time))
                ]
            );
            if($master->verification_status == 6){
                $master->increment('verification_status');
            }
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
        } else {
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_5));
        }
        /*
        $master = Master::find($request->master_id);
        if($request->call_time){
            $master->update(
                [
                    'verification_status' => ($master->verification_status) + 1,
                    'call_time' => date("Y-m-d H:i:s", strtotime($request->call_time))
                ]
            );
            return ErrorCode::sendStatus(ErrorCode::CODE_1);
        } else {
            $master->update(
                [
                    'verification_status' => ($master->verification_status) + 1
                ]
            );
            return ErrorCode::sendStatus(ErrorCode::CODE_1);
        }*/
    }
}