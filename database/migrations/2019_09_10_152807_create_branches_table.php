<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name', 100);
			$table->integer('activity_id')->unsigned();
			$table->string('longitude', 100);
			$table->string('latitude', 100);
            $table->string('mobile');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('branches');
	}
}
