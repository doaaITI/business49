<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchImagesTable extends Migration {

	public function up()
	{
		Schema::create('branch_images', function(Blueprint $table) {
			$table->increments('id');

			$table->text('image');
            $table->integer('branch_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('branch_images');
	}
}
