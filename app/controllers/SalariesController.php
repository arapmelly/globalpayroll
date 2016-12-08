<?php

class SalariesController extends \BaseController {

	/**
	 * Display a listing of salaries
	 *
	 * @return Response
	 */
	public function index()
	{
		$salaries = Salary::all();

		return View::make('salaries.index', compact('salaries'));
	}

	/**
	 * Show the form for creating a new salary
	 *
	 * @return Response
	 */
	public function create($type)
	{

		if($type == 'advance'){
			$category = 'deduction';
		}elseif($type == 'earning'){
			$category = 'earning';
		}if($type == 'deduction'){
			$category = 'deduction';
		}

		$months = array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');

		$employees = Employee::all();

		return View::make('salaries.create', compact('months', 'employees', 'category', 'type'));
	}

	/**
	 * Store a newly created salary in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Salary::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$type = array_get($data, 'category');

		$salary = new Salary;
		$salary->payroll_year = array_get($data, 'payroll_year');
		$salary->category = array_get($data, 'category');
		$salary->type = array_get($data, 'type');
		$salary->value = array_get($data, 'value');
		$salary->start_month = array_get($data, 'start_month');
		$salary->end_month = array_get($data, 'end_month');
		$salary->employee_id = array_get($data, 'employee_id');
		$salary->save();

		return Redirect::to('payments/'.$type);
	}

	/**
	 * Display the specified salary.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$salary = Salary::findOrFail($id);

		return View::make('salaries.show', compact('salary'));
	}

	/**
	 * Show the form for editing the specified salary.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$salary = Salary::find($id);

		return View::make('salaries.edit', compact('salary'));
	}

	/**
	 * Update the specified salary in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$salary = Salary::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Salary::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$type = array_get($data, 'category');


		$salary->payroll_year = array_get($data, 'payroll_year');
		$salary->category = array_get($data, 'category');
		$salary->type = array_get($data, 'type');
		$salary->value = array_get($data, 'value');
		$salary->start_month = array_get($data, 'start_month');
		$salary->end_month = array_get($data, 'end_month');
		$salary->employee_id = array_get($data, 'employee_id');
		$salary->update();

		return Redirect::to('payments/'.$type);
	}

	/**
	 * Remove the specified salary from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salary = Salary::find($id);

		Salary::destroy($id);

		return Redirect::to('payments/'.$salary->category);
	}


	public function enable($id)
	{
		$salary = Salary::find($id);
		$salary->is_disabled = false;
		$salary->update();

		return Redirect::to('payments/'.$salary->category);
	}


	public function disable($id)
	{
		$salary = Salary::find($id);
		$salary->is_disabled = true;
		$salary->update();

		return Redirect::to('payments/'.$salary->category);
	}

}
