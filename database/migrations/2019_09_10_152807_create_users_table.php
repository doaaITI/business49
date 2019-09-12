<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');

            $table->string('name', 100);
            $table->string('password');
			$table->string('base_location', 100);
			$table->string('department', 100);
			$table->text('description');
			$table->string('brand_image', 150)->nullable();
			$table->string('email', 100)->unique();
            $table->string('mobile', 100)->unique();
            $table->rememberToken();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('activities');
	}
}
