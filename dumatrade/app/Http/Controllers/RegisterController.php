<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('register');
	}

	public function register(){
        $rules = array(
            'email'    => 'required|email',
            'userName' => 'required|min:8|unique:users',
            'name'     => 'required',
            'password' => 'required',
            'passwordv'=> 'required|same:password'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('register')->withErrors($validator)->withInput();
        }
        else{
            $user = new User();
            $user->name = Input::get('name');
            $user->userName = Input::get('userName');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();
            $user->save();
            Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]);
            return Redirect::to('/');
        }
    }

    public function changeInfo(){

    }

}
