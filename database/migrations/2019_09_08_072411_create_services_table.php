<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');

			$table->string('service_provider')->nullable();
			$table->string('type')->nullable();
			$table->string('responsible', 100)->nullable();
			$table->string('phone_num')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}
