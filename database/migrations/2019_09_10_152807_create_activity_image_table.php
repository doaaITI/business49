<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityImageTable extends Migration {

	public function up()
	{
		Schema::create('activity_image', function(Blueprint $table) {
			$table->increments('id');

			$table->text('image');
            $table->integer('activity_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('activity_image');
	}
}
