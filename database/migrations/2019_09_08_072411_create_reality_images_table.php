<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealityImagesTable extends Migration {

	public function up()
	{
		Schema::create('reality_images', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('realty_id')->unsigned();
			$table->text('image')->nullable();

            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('reality_images');
	}
}
