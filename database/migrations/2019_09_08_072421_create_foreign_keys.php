<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('realties', function(Blueprint $table) {
			$table->foreign('owner_id')->references('id')->on('owners')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reality_images', function(Blueprint $table) {
			$table->foreign('realty_id')->references('id')->on('realties')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('units', function(Blueprint $table) {
			$table->foreign('realty_id')->references('id')->on('realties')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('unit_images', function(Blueprint $table) {
			$table->foreign('unit_id')->references('id')->on('units')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->foreign('unit_id')->references('id')->on('units')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('unit_services', function(Blueprint $table) {
			$table->foreign('unit_id')->references('id')->on('units')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('unit_services', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('services')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('realties', function(Blueprint $table) {
			$table->dropForeign('realties_owner_id_foreign');
		});
		Schema::table('reality_images', function(Blueprint $table) {
			$table->dropForeign('reality_images_realty_id_foreign');
		});
		Schema::table('units', function(Blueprint $table) {
			$table->dropForeign('units_realty_id_foreign');
		});
		Schema::table('unit_images', function(Blueprint $table) {
			$table->dropForeign('unit_images_unit_id_foreign');
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->dropForeign('contracts_unit_id_foreign');
		});
		Schema::table('unit_services', function(Blueprint $table) {
			$table->dropForeign('unit_services_unit_id_foreign');
		});
		Schema::table('unit_services', function(Blueprint $table) {
			$table->dropForeign('unit_services_service_id_foreign');
		});
	}
}
