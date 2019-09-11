<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	public function up()
	{
		Schema::create('contracts', function(Blueprint $table) {
			$table->increments('id');

			$table->string('user_name', 100)->nullable();
			$table->bigInteger('user_id')->unique();
			$table->date('birth_date')->nullable();
			$table->enum('social_status', array('Single', 'Married'));
			$table->string('phone_num', 100)->unique();
			$table->string('email', 100)->unique();
			$table->string('work_location', 150)->nullable();
			$table->string('user_nationality', 100)->nullable();
			$table->enum('contract_duarion', array('Daily', 'Monthly', 'Yearly'));
			$table->date('start_date');
			$table->integer('unit_id')->unsigned();
			$table->text('terms')->nullable();
			$table->text('notes')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contracts');
	}
}
