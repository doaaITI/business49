<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitsTable extends Migration {

	public function up()
	{
		Schema::create('units', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('roof_num')->unsigned()->default('0');
			$table->integer('realty_id')->unsigned();
			$table->integer('rooms_num')->unsigned()->default('0');
			$table->integer('receptions_num')->unsigned();
			$table->integer('bathrooms_num')->unsigned();
			$table->enum('kitchen_cabinet', array('YES', 'NO'));
			$table->integer('size')->unsigned();
			$table->enum('spcial_parking', array('YES', 'NO'));
			$table->string('Electricity_account', 100)->nullable();
			$table->string('water_account', 100)->nullable();
			$table->enum('electricity_shared', array('YES', 'NO'));
			$table->enum('water_shared', array('YES', 'NO'));
			$table->text('describtion')->nullable();
			$table->text('notes')->nullable();
			$table->enum('rent_type', array('Yearly', 'Monthly', 'Daily'));
            $table->enum('status', array('unOccupied', 'Rent', 'Maintenance'));
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('units');
	}
}
