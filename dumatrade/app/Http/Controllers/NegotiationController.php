<?php namespace App\Http\Controllers;

use App\Cart;
use App\CartController;
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

class NegotiationController extends Controller {

    public function index($id){
        $prodCat = Products::where('id', '=', $id)->get();
        return view('negotiate')->with('prods',$prodCat);
    }

    public function save($id){
        $rules = array(
            'price' => 'required',
            'message' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('negotiate/'.$id)->withErrors($validator)->withInput();
        }
        else{
            $product = Products::find($id);
            $negotiation = new Negotiations();
            $negotiation->buyer_id = Auth::user()->id;
            $negotiation->seller_id = $product->user_id;
            $negotiation->product_id = $id;
            $negotiation->message = Input::get('message');
            $negotiation->bidPrice = Input::get('price');
            $negotiation->created_at = Carbon::now();
            $negotiation->updated_at = Carbon::now();
            $product->status = "Reserved";
            $product->save();
            $negotiation->save();
            return Redirect::to('/');
        }
    }

    public function listPending(){
        $negotiations = Negotiations::where('buyer_id', '=', Auth::user()->id)->get();
        $products = Products::all();
        return view('pendingpurchases')->with('prods', $products)->with('negotiations', $negotiations);
    }

    public function deleteRequest($id){
        $negotiation = Negotiations::find($id);
        $product = Products::where('id', '=', $negotiation->product_id)->first();
        $product->status = 'Onsale';
        $product->save();
        $negotiation->delete();
        return Redirect::to('pendingpurchases');
    }

    public function rejectRequest($id){
        $negotiation = Negotiations::find($id);
        $negotiation->deal = 'Rejected';
        $negotiation->save();
        return Redirect::to('requests');
    }

    public function approveRequest($id){
        $negotiation = Negotiations::find($id);
        $negotiation->deal = 'Approved';
        $negotiation->save();
        $products = Products::find($negotiation->product_id);
        $products->status = 'Sold';
        $cart = new Cart();
        $cart->product_id = $products->id;
        $cart->seller_id = $negotiation->seller_id;
        $cart->buyer_id = $negotiation->buyer_id;
        $products->save();
        $cart->save();
        return Redirect::to('requests');
    }

    public function listRequests(){
        $negotiations = Negotiations::where('seller_id', '=', Auth::user()->id)
            ->where('deal', '!=', 'Rejected')->where('deal', '!=', 'Approved')->get();
        $products = Products::all();
        $user = User::all();
        return view('approve')->with('negotiations', $negotiations)->with('prods', $products)->with('users',$user);
    }
}
