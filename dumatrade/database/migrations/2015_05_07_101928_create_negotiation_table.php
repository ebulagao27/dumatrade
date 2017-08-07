<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegotiationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('negotiation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('buyer_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('message');
            $table->float('bidPrice');
            $table->boolean('deal');
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('negotiation');
	}

}
