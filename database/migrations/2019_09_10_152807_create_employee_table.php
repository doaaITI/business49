<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeTable extends Migration {

	public function up()
	{
		Schema::create('employee', function(Blueprint $table) {
			$table->increments('id');

			$table->string('name')->nullable();
			$table->text('image')->nullable();
			$table->date('work_start_date')->nullable();
			$table->date('work_end_date')->nullable();
			$table->date('stay_end_date')->nullable();
			$table->string('mobile')->nullable();
			$table->string('email', 100)->nullable();
			$table->integer('job_id')->nullable();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('employee');
	}
}
