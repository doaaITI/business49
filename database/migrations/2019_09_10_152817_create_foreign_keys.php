<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('branches', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('activity_image', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('branch_images', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('employee', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('branches', function(Blueprint $table) {
			$table->dropForeign('branches_user_id_foreign');
		});
		Schema::table('activity_image', function(Blueprint $table) {
			$table->dropForeign('activity_image_user_id_foreign');
		});
		Schema::table('branch_images', function(Blueprint $table) {
			$table->dropForeign('branch_images_branch_id_foreign');
		});

		Schema::table('employee', function(Blueprint $table) {
			$table->dropForeign('employee_branch_id_foreign');
		});
	}
}
