<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name')->nullable();
			$table->text('image');
			$table->text('description')->nullable();
			$table->integer('original_price')->unsigned()->default('0');
			$table->integer('tax')->unsigned()->nullable();
			$table->enum('type', array('product', 'service'));
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
