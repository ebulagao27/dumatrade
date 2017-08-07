<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Negotiations extends Model {

	protected $table = 'negotiation';

    protected $fillable = ['buyer_id','seller_id','product_id','message','bidPrice','deal','created_at','updated_at'];

}
