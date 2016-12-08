<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salaries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('category')->nullable();
			$table->string('type')->nullable();
			$table->float('value', 10,2);
			$table->string('start_month')->nullable();
			$table->string('payroll_year')->nullable();
			$table->string('end_month')->nullable();
			$table->integer('employee_id')->unsigned();
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->boolean('is_disabled')->default(false);
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
		Schema::drop('salaries');
	}

}
