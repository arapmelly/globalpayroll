<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatescalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratescales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rate_id')->unsigned();
			$table->foreign('rate_id')->references('id')->on('rates');
			$table->float('lower_limit', 10,2)->default(0);
			$table->float('upper_limit', 10,2)->default(0);
			$table->float('value', 10,2)->default(0);
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
		Schema::drop('ratescales');
	}

}
