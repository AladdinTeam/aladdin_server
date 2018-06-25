<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Libraries\SafeCrow\SafeCrow;
use App\Master;
use App\Order;
use App\Subcategory;
use App\Subway;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    public function __construct()
    {
          $this->middleware("client_auth")->only("saveOrder");
    }

    public function index(Request $request){
        $categories = Category::get();
        $subways = Subway::get();
        if((isset($request->subcategory)) or (isset($request->page))){
            if(isset($request->subcategory)) {
                if($request->category == 0){
                    $category_id = Subcategory::find($request->subcategory)->category->id;
                    session([
                        "category" => $category_id,
                        "subcategory" => $request->subcategory,
                        "subway" => $request->subway,
                        "safety" => $request->safety
                    ]);
                } else {
                    session([
                        "category" => $request->category,
                        "subcategory" => $request->subcategory,
                        "subway" => $request->subway,
                        "safety" => $request->safety
                    ]);
                }
            }
            $local_category = $request->session()->get('category');
            $local_subcategory = $request->session()->get('subcategory');
            $local_subway = $request->session()->get('subway');
            $local_safety = $request->session()->get('safety');
            //echo $local_safety.' '.$local_subway.' '.$local_subcategory.' '.$local_category;

            if(($local_category != 0 ) and ($local_subcategory == 0)
                and ($local_subway == 0)){

                $subcategories = Category::find($local_category)->subcategories;
                $subcategories_id = [];
                foreach ($subcategories as $subcategory){
                    $subcategories_id[] = $subcategory->id;
                }
                if(isset($local_safety)) {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subcategories", function ($query) use ($subcategories_id) {
                            $query->whereIn('subcategories.id', $subcategories_id);
                        })->whereHas('master_info', function ($query) {
                            $query->where('master_info.card_id', '<>', null);
                        })->simplePaginate(5);
                } else {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subcategories", function ($query) use ($subcategories_id) {
                            $query->whereIn('subcategories.id', $subcategories_id);
                        })->has('master_info')->simplePaginate(5);
                }

                foreach ($masters as $master) {
                    $count = $master->work_orders()->where('status', 3)->count();
                    $master->count = $count;
                    if ($master->master_info->card_id != null) {
                        $master->safety = 1;
                    } else {
                        $master->safety = 0;
                    }
                    $master->about = $master->master_info->about;
                }

                return view('search')->with([
                    "masters" => $masters,
                    "categories" => $categories,
                    "category" => $local_category,
                    "subcategories" => $subcategories,
                    "subways" => $subways,
                    "safety" => $local_safety
                ]);
            } elseif(($local_category != 0 ) and ($local_subcategory != 0)
                and ($local_subway == 0)) {

                $subcategories = Category::find($local_category)->subcategories;

                if(isset($local_safety)) {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subcategories", function ($query) use ($local_subcategory) {
                            $query->where('subcategories.id', $local_subcategory);
                        })->whereHas('master_info', function ($query) {
                            $query->where('master_info.card_id', '<>', null);
                        })->simplePaginate(5);
                } else {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subcategories", function ($query) use ($local_subcategory) {
                            $query->where('subcategories.id', $local_subcategory);
                        })->has('master_info')->simplePaginate(5);
                }

                foreach ($masters as $master) {
                    $count = $master->work_orders()->where('status', 3)->count();
                    $master->count = $count;
                    if ($master->master_info->card_id != null) {
                        $master->safety = 1;
                    } else {
                        $master->safety = 0;
                    }
                    $master->about = $master->master_info->about;
                }

                return view('search')->with([
                    "masters" => $masters,
                    "categories" => $categories,
                    "category" => $local_category,
                    "subcategories" => $subcategories,
                    "subcategory" => $local_subcategory,
                    "subways" => $subways,
                    "safety" => $local_safety
                ]);
            } elseif(($local_category != 0 ) and ($local_subcategory != 0)
                and ($local_subway != 0)) {

                $subcategories = Category::find($local_category)->subcategories;

                if(isset($local_safety)) {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subways", function ($query) use ($local_subway) {
                            $query->where('subways.id', $local_subway);
                        })->whereHas("subcategories", function ($query) use ($local_subcategory) {
                            $query->where('subcategories.id', $local_subcategory);
                        })->whereHas('master_info', function ($query) {
                            $query->where('master_info.card_id', '<>', null);
                        })->simplePaginate(5);
                } else {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subways", function ($query) use ($local_subway) {
                            $query->where('subways.id', $local_subway);
                        })->whereHas("subcategories", function ($query) use ($local_subcategory) {
                            $query->where('subcategories.id', $local_subcategory);
                        })->has('master_info')->simplePaginate(5);
                }

                foreach ($masters as $master) {
                    $count = $master->work_orders()->where('status', 3)->count();
                    $master->count = $count;
                    if ($master->master_info->card_id != null) {
                        $master->safety = 1;
                    } else {
                        $master->safety = 0;
                    }
                    $master->about = $master->master_info->about;
                }

                return view('search')->with([
                    "masters" => $masters,
                    "categories" => $categories,
                    "category" => $local_category,
                    "subcategories" => $subcategories,
                    "subcategory" => $local_subcategory,
                    "subways" => $subways,
                    "subway" => $local_subway,
                    "safety" => $local_safety
                ]);
            } elseif(($local_category != 0 ) and ($local_subcategory == 0)
                and ($local_subway != 0)) {

                $subcategories = Category::find($local_category)->subcategories;
                $subcategories_id = [];
                foreach ($subcategories as $subcategory){
                    $subcategories_id[] = $subcategory->id;
                }
                if(isset($local_safety)) {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subways", function ($query) use ($local_subway) {
                            $query->where('subways.id', $local_subway);
                        })->whereHas("subcategories", function ($query) use ($subcategories_id) {
                            $query->whereIn('subcategories.id', $subcategories_id);
                        })->whereHas('master_info', function ($query) {
                            $query->where('master_info.card_id', '<>', null);
                        })->simplePaginate(5);
                } else {
                    $masters = Master::select('id', 'first_name', 'last_name')
                        ->whereHas("subways", function ($query) use ($local_subway) {
                            $query->where('subways.id', $local_subway);
                        })->whereHas("subcategories", function ($query) use ($subcategories_id) {
                            $query->whereIn('subcategories.id', $subcategories_id);
                        })->has('master_info')->simplePaginate(5);
                }

                foreach ($masters as $master) {
                    $count = $master->work_orders()->where('status', 3)->count();
                    $master->count = $count;
                    if ($master->master_info->card_id != null) {
                        $master->safety = 1;
                    } else {
                        $master->safety = 0;
                    }
                    $master->about = $master->master_info->about;
                }

                return view('search')->with([
                    "masters" => $masters,
                    "categories" => $categories,
                    "category" => $local_category,
                    "subcategories" => $subcategories,
                    "subways" => $subways,
                    "subway" => $local_subway,
                    "safety" => $local_safety
                ]);
            } else {
                $error = 'Уточните, пожалуйста, запрос!';
                return view('search', ["categories" => $categories, "subways" => $subways, "error" => $error]);
            }
        } elseif(isset($request->subcategory)){

        }
        else {
            return view('search', ["categories" => $categories, "subways" => $subways]);
        }
    }

    public function getSubcategories(Request $request){
        $subcategories = Subcategory::select('id', 'name')->where("category_id", "=", $request->category)->get();
        $result = "<option value='0'>Выберите подкатегорию</option>";
        for ($i = 0; $i < count($subcategories); $i++){
            $result .= "<option value='".$subcategories[$i]['id']."'>".$subcategories[$i]['name']."</option>";
        }

        echo $result;
    }

    public function miniOrder(Request $request){
        $validator = Validator::make($request->all(),
            [
                'category' => "required|numeric|min:1",
                'subcategory' => "required|numeric|min:1",
                'subway' => "numeric|min:1",
                'phone' => 'required|min:17|max:17',
                //'price' => "required|numeric|min:1",
                'header' => "required",
                'amount' => "required|numeric"
            ],
            [
                'category.required' => "Выберите категорию",
                'category.min' => "Выберите категорию",
                'subcategory.required' => "Выберите подкатегорию",
                'subcategory.min' => "Выберите подкатегорию",
                'subway.min' => "Выберите подкатегорию",
                'header.required' => "Введите, что требуется сделать",
                'phone.required' => 'Введите корректный номер телефона',
                'phone.min' => 'Введите корректный номер телефона',
                'phone.max' => 'Введите корректный номер телефона',
                'amount.required' => "Введите сумму",
                'amount.numeric' => 'Введите число'
            ]);
        //$validator->validate();
        if($validator->fails()) {
            if($request->st == 1) {
                return redirect('/#search_form')
                    ->withErrors($validator)
                    ->withInput();
            } elseif ($request->st == 2){
                return redirect('/best_price#search_form')
                    ->withErrors($validator)
                    ->withInput();
            } elseif($request->st == 3){
                return redirect('/profile/'.$request->master_id)
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modal_state', 'open');
            }
        }
        //$data = $request->all();
        $data = $request->except('_token');
        //print_r($data);
        session(
            [
                'phone' => $request->phone,
                //'login_target' => $request->path(),
                'login_data' => serialize($data)
            ]
        );
        return redirect()->action('SearchController@saveOrder');
    }

    public function saveFullOrder(Request $request){
        $validator = Validator::make($request->all(),
            [
                'category' => "required|numeric|min:1",
                'subcategory' => "required|numeric|min:1",
                'subway' => "required|numeric|min:1",
                //'price' => "required|numeric|min:1",
                'header' => "required",
                'description' => "required",
                'address' => 'required',
                'date' => 'required',
                'amount' => "required|numeric"
            ],
            [
                'categories.required' => "Выберите категорию",
                'categories.min' => "Выберите категорию",
                'subcategories.required' => "Выберите подкатегорию",
                'subcategories.min' => "Выберите подкатегорию",
                'subway.required' => "Выберите станцию метро",
                'subway.min' => "Выберите станцию метро",
                'header.required' => "Введите, что требуется сделать",
                'description.required' => "Введите описание проблемы",
                'address.required' => 'Введите адрес',
                'date.required' => 'Введите дату окончания актуальности заказа',
                'amount.required' => "Введите сумму",
                'amount.numeric' => 'Введите число'
            ]);
        $validator->validate();
        if(isset($request->master_id)){
            $master_id = $request->master_id;
        } else {
            $master_id = null;
        }

        $date = new DateTime($request->date);
        if(isset($request->order)){
            $order = Order::find($request->order);
            $order->update([
                'sc_id' => 1,
                "category_id" => $request->category,
                "subcategory_id" => $request->subcategory,
                "subway_id" => $request->subway,
                //"price" => $data["price"],
                "header" => $request->header,
                "description" => $request->description,
                "address" => $request->address,
                "end_date" => $date->format('Y-m-d'),
                "amount" => $request->amount,
                "safety" => (isset($request->safety)) ? 1 : 0,
                "status" => 0
            ]);
        } else {
            Order::create(
                [
                    'sc_id' => 1,
                    'master_id' => $master_id,
                    "client_id" => Crypt::decryptString(session()->get("id")),
                    "category_id" => $request->category,
                    "subcategory_id" => $request->subcategory,
                    "subway_id" => $request->subway,
                    //"price" => $data["price"],
                    "header" => $request->header,
                    "description" => $request->description,
                    "address" => $request->address,
                    "end_date" => $date->format('Y-m-d'),
                    "amount" => $request->amount,
                    "safety" => (isset($request->safety)) ? 1 : 0,
                    "status" => 0
//                "free" => (isset($data["free"])) ? 1 : 0,
                ]);
        }
        return redirect('/orders');
    }

    public function saveOrder(){
        //echo "This is SaveOrder";
        $data = unserialize(session()->get('login_data'));
        session()->forget("login_data");
        if(isset($data['master_id'])){
            $master_id = $data['master_id'];
        } else {
            $master_id = null;
        }
        if(isset($data['subway'])){
            Order::create(
                [
                    'sc_id' => 1,
                    'master_id' => $master_id,
                    "client_id" => Crypt::decryptString(session()->get("id")),
                    "category_id" => $data["category"],
                    "subcategory_id" => $data["subcategory"],
                    "subway_id" => $data["subway"],
                    //"price" => $data["price"],
                    "header" => $data["header"],
                    //"description" => $data["description"],
                    //"address" => $data['address'],
                    //"date" => $data['date'],
                    "amount" => $data["amount"],
                    "safety" => (isset($data["safety"])) ? 1 : 0,
                    "status" => -1
//                "free" => (isset($data["free"])) ? 1 : 0,
                ]);
        }else {
            Order::create(
                [
                    'sc_id' => 1,
                    'master_id' => $master_id,
                    "client_id" => Crypt::decryptString(session()->get("id")),
                    "category_id" => $data["category"],
                    "subcategory_id" => $data["subcategory"],
                    //"subway_id" => $data["subway"],
                    //"price" => $data["price"],
                    "header" => $data["header"],
                    //"description" => $data["description"],
                    //"address" => $data['address'],
                    //"date" => $data['date'],
                    "amount" => $data["amount"],
                    "safety" => (isset($data["safety"])) ? 1 : 0,
                    "status" => -1
//                "free" => (isset($data["free"])) ? 1 : 0,
                ]);
        }
        return redirect('/orders');
    }


    /*public function getMasters($request){
        if(true) {
            $masters = Master::select('id', 'first_name', 'last_name')->whereHas("subways", function ($query) {
                $query->where('subways.id', '<', 67);
            })->whereHas("subcategories", function ($query) {
                $query->where('subcategories.id', 1);
            })->whereHas('master_info', function ($query) {
                $query->where('status', 1);
            })->simplePaginate(5);
        } else{
            $masters = Master::select('id', 'first_name', 'last_name')->whereHas("subways", function ($query) {
                $query->where('subways.id', 1);
            })->whereHas("subcategories", function ($query) {
                $query->where('subcategories.id', 1);
            })->has('master_info')->simplePaginate(5);
        }

        foreach ($masters as $master){
            $count = $master->work_orders()->where('status', 3)->count();
            //echo $count;
            $master->count = $count;
            if($master->master_info->card_id != null){
                $master->safety = 1;
            } else{
                $master->safety = 0;
            }
            $master->about = $master->master_info->about;
        }

        //print_r($masters);
        return view("search")->with("masters", $masters);
    }*/

    public function hh()
    {
        return view('home');
    }
}
