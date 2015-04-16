<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('slug');
			$table->string('name');
			$table->string('lastname');
			$table->integer('phone');
            $table->enum('blood_type', ['o-', 'o+', 'a+', 'a-', 'b+', 'b-', 'ab-', 'ab+']);
			$table->boolean('donor');
			$table->string('country');
			$table->string('city');
			$table->string('address');
			$table->string('medals');
            $table->enum('type', ['patient', 'doctor', 'admin', 'superAdmin']);
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
		Schema::drop('users');
	}

}