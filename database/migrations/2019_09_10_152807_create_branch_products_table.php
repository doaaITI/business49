<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchProductsTable extends Migration {

	public function up()
	{
		Schema::create('branch_products', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('branch_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('branch_products');
	}
}
