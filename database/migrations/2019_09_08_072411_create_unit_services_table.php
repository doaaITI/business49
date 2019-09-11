<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitServicesTable extends Migration {

	public function up()
	{
		Schema::create('unit_services', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('unit_id')->unsigned();
			$table->integer('service_id')->unsigned();
			$table->text('desciption')->nullable();
			$table->enum('status', array('Done', 'Cancelled', 'Paid', 'Progress', 'Sent'));
            $table->string('price')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('unit_services');
	}
}
