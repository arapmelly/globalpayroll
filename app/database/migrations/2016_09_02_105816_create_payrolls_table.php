<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayrollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payrolls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('month')->nullable();
			$table->string('category')->nullable();
			$table->string('type')->nullable();
			$table->float('value', 10,2)->default(0);
			$table->integer('employee_id')->unsigned();
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->string('year')->nullable();
			$table->boolean('is_closed')->default(false);
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
		Schema::drop('payrolls');
	}

}
