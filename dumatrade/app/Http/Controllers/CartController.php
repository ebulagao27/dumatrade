<?php namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Negotiations;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

	public function index()
	{
        $cart = Negotiations::where('buyer_id', '=', Auth::user()->id)->where('deal', '=', 'Approved')->get();
        $sum = Negotiations::where('buyer_id', '=', Auth::user()->id)->where('deal', '=', 'Approved')->sum('bidPrice');
        $user = User::all();
        $products = Products::all();

        return view('shoppingcart')->with('cart', $cart)->with('users', $user)->with('prods', $products)->with('sum', $sum);
	}

}
