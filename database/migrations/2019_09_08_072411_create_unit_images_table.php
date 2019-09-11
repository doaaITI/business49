<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitImagesTable extends Migration {

	public function up()
	{
		Schema::create('unit_images', function(Blueprint $table) {
			$table->increments('id');

			$table->text('image');
            $table->integer('unit_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('unit_images');
	}
}
