<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('slug');
			$table->longText('description');
            $table->enum('type', ['Doctor', 'Hospital', 'digital_group', 'group']);
			$table->string('specialty');
			$table->string('country');
			$table->string('city');
			$table->string('address');
			$table->string('map');
			$table->string('parent');
			$table->string('media');
			$table->string('medals');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}
}