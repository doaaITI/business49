<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnersTable extends Migration {

	public function up()
	{
		Schema::create('owners', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name', 150)->default('none');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
			$table->string('phone_num', 100)->unique()->default('null');
			$table->string('address', 100)->nullable();
			$table->string('password', 100);
            $table->text('remember_token');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('owners');
	}
}
