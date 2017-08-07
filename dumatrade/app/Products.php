<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $primaryKey = 'id';

	protected $table = 'products';

    protected $fillable = ['user_id', 'name', 'category_id', 'description', 'price', 'quantity', 'image'
                                , 'created_at', 'updated_at'];
}
