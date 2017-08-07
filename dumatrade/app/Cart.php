<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $table = 'shoppingcart';
    protected $fillable = ['product_id','seller_id','buyer_id','status'];

}
