<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Subcategory;
use App\Subway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware("client_auth")->only("saveOrder");
    }

    public function index(){
        return view("search");
    }

    public function getCategories(){
        $result = "";
        $categories = Category::get(["id", "name"]);
        $result .= "<option value='0'>Категория</option>";
        for ($i = 0; $i < count($categories); $i++){
            $result .= "<option value='".$categories[$i]['id']."'>".$categories[$i]['name']."</option>";
        }

        $result .= "<---->";

        $result .= "<option value='0'>Метро</option>";
        $subways = Subway::get(["id", "name"]);
        for ($i = 0; $i < count($subways); $i++){
            $result .= "<option value='".$subways[$i]['id']."'>".$subways[$i]['name']."</option>";
        }

        echo $result;
    }

    public function getSubcategories(){
        $result = "";
        $subcategories = Subcategory::select('id', 'name')->where("category_id", "=", $_GET['category'])->get();
        $result .= "<option value='0'>Подкатегория</option>";
        for ($i = 0; $i < count($subcategories); $i++){
            $result .= "<option value='".$subcategories[$i]['id']."'>".$subcategories[$i]['name']."</option>";
        }

        echo $result;
    }

    public function bestPrice(Request $request){
        $validator = Validator::make($request->all(),
            [
                'categories' => "required|numeric|min:1",
                'subcategories' => "required|numeric|min:1",
                'subway' => "required|numeric|min:1",
                'price' => "required|numeric|min:1",
                'header' => "required",
                'description' => "required",
                'amount' => "required|numeric"
            ],
            [
                'categories.required' => "Выберите категорию",
                'categories.min' => "Выберите категорию",
                'subcategories.required' => "Выберите подкатегорию",
                'subcategories.min' => "Выберите подкатегорию",
                'subway.required' => "Выберите станцию метро1",
                'subway.min' => "Выберите станцию метро",
                'price.required' => "Выберите ожидание по цене",
                'price.min' => "Выберите ожидание по цене",
                'header.required' => "Введите, что требуется сделать",
                'description.required' => "Введите описание проблемы",
                'amount.required' => "Введите сумму",
                'amount.numeric' => 'Введите число'
            ]);
        $validator->validate();
        //$data = $request->all();
        $data = $request->except('_token');
        session(
            [
                'login_target' => $request->path(),
                'login_data' => serialize($data)
            ]
        );
        //$this->saveOrder();
        return redirect()->action('SearchController@saveOrder');
        //print_r($request->all());
        /*if($validator->fails()){
            return redirect("search#best_price")->withErrors($validator)->withInput();
        }*/
        //echo ('gg');
        //return redirect('/lk/orders');
        /*echo "gg";
        print_r($_POST);*/
    }

    public function saveOrder(){
        $data = unserialize(session()->get('login_data'));
        session()->forget("login_data");
        if(isset($data['master_id'])){
            $master_id = $data['master_id'];
        } else {
            $master_id = null;
        }
        Order::create(
            [
                "client_id" => Crypt::decryptString(session()->get("id")),
                "category_id" => $data["categories"],
                "subcategory_id" => $data["subcategories"],
                "subway_id" => $data["subway"],
                "price" => $data["price"],
                "header" => $data["header"],
                "description" => $data["description"],
                "amount" => $data["amount"],
                "safety" => (isset($data["safety"])) ? 1 : 0,
                "status" => 0
//                "free" => (isset($data["free"])) ? 1 : 0,
            ]);
        return redirect('/lk/orders');
    }

    public function hh()
    {
        return view('home');
    }
}
