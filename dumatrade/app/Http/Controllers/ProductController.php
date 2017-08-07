<?php namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Negotiations;
use App\Products;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    public function index(){
        $cat = Categories::all();
        return view('addproduct')->with('cat', $cat);
    }
    public function listByCat($id){
        $prodCat = Products::where('category_id', '=', $id)->get();
        $cat = Categories::all();
        $sellers = User::all();
        return view('listproducts')->with('prods', $prodCat)->with('cat', $cat)->with('sellers', $sellers);
    }
    public function listProducts(){
        $cat = Categories::all();
        $sellers = User::all();
        $products = Products::all();
        return view('listproducts')->with('prods', $products)->with('cat', $cat)
            ->with('sellers', $sellers);
    }

    public function listShop(){
        $cat = Categories::all();
        $sellers = User::all();
        $products = Products::all();
        return view('shoppingcart')->with('prods', $products)->with('cat', $cat)->with('sellers', $sellers);
    }

    public function editProduct($id){
        $cat = Categories::all();
        $product = Products::where('id', '=', $id)->get();
        return view('editproduct')->with('prods', $product)->with('cat', $cat);
    }
    public function saveEdit(){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('editproduct/'.Input::get('id'))->withErrors($validator)->withInput();
        }
        else{
            $product = Products::find(Input::get('id'));
            $product->user_id = Auth::user()->id;
            $product->name = Input::get('name');
            $product->category_id = Input::get('category_id');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();
            $product->save();
            return Redirect::to('profile');
        }
    }
    public function deleteProduct($id){
        $product = Products::find($id);
        $product->delete();
        return Redirect::to('profile');
    }
    public function viewProduct($id){
        $prodCat = Products::where('id', '=', $id)->get();
        return view('viewproduct')->with('prods',$prodCat);
    }
    public function storeProduct(){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('addproduct')->withErrors($validator)->withInput();
        }
        else{
            $product = new Products();
            $product->user_id = Auth::user()->id;
            $product->name = Input::get('name');
            $product->category_id = Input::get('category_id');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->status = "Onsale";
            $product->created_at = Carbon::now();
            $product->updated_at = Carbon::now();


            $destinationPath = 'uploads';
            $extension = Input::file('images')->getClientOriginalExtension();
            $fileName = $product->id.rand(10000, 99999).'.'.$extension;
            $product->image = $fileName;
            Input::file('images')->move($destinationPath, $fileName);

            $product->save();
            return Redirect::to('/');
        }
    }

    public function notification(){
        $cat = Categories::all();
        $sellers = User::all();
        $products = Products::all();
        return view('notifs')->with('prods', $products)->with('cat', $cat)->with('sellers', $sellers);
    }
    public function approve($id){
        $prodCat = Products::where('id', '=', $id)->get();
        return view('approve')->with('prods',$prodCat);
    }
}
