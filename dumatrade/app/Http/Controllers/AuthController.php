<?php namespace App\Http\Controllers;

use App\Products;
use App\Categories;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    public function index(){
        if(Auth::check()){
            return view('homepage');
        }
        else{
            return view('login');
        }
    }
    public function authenticate(){
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $email = Input::get('email');
            $password = Input::get('password');
            $remember = Input::get('remember_token');
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login');
            }
        }
    }

    public function changePassword(){

    }
		public function callProfile(){
        if(Auth::guest()){
            return Redirect::to('login');
        }
        else{
            $uInfo = User::where('id', '=', Auth::user()->id)->get();
            $products = Products::where('user_id', '=', Auth::user()->id)->get();
            $category = Categories::all();
            return view('profile')->with('info', $uInfo)->with('products', $products)->with('category', $category);
        }

    }

}
