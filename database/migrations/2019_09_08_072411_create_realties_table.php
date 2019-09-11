<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealtiesTable extends Migration {

	public function up()
	{
		Schema::create('realties', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name', 100);
			$table->integer('realty_num');
			$table->string('type', 50);
			$table->integer('floor_num')->unsigned()->default('0');
			$table->integer('owner_id')->unsigned();
			$table->integer('parking_num')->unsigned()->default('0');
			$table->integer('lifter_num')->unsigned()->default('0');
			$table->string('watchman_phone', 100)->nullable();
			$table->string('watchman_name', 100)->nullable();
			$table->text('notes')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('realties');
	}
}
