<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXUsersTable extends Migration {

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
			$table->string('username')->nullable()->unique('username');
			$table->string('email')->nullable();
			$table->string('password');
			$table->string('confirmation_code')->nullable();
			$table->string('remember_token')->nullable();
			$table->boolean('confirmed')->default(1);
			$table->timestamps();
			$table->string('user_type', 20)->nullable()->default('admin');
			$table->boolean('is_active')->nullable();
			$table->integer('phone')->nullable();
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
