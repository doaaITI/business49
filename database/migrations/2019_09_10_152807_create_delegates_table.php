<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDelegatesTable extends Migration {

	public function up()
	{
		Schema::create('delegates', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('phone')->unique();
            $table->integer('delegate_serial')->index();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('delegates');
	}
}
