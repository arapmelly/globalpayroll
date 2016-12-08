<?php

class PayrollsController extends \BaseController {

	/**
	 * Display a listing of payrolls
	 *
	 * @return Response
	 */
	public function index()
	{
		$payrolls = Payroll::all();

		return View::make('payrolls.index', compact('payrolls'));
	}

	/**
	 * Show the form for creating a new payroll
	 *
	 * @return Response
	 */
	public function create()
	{
		$employees = Employee::all();

		$months = array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');

		return View::make('payrolls.create', compact('months'));
	}

	/**
	 * Store a newly created payroll in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Payroll::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		
		$month = array_get($data, 'month');
		$year = array_get($data, 'year');

		//$employees = array_get($data, 'employee');

		Payroll::process($month, $year);
		

		return Redirect::to('payrolls/show/'.$month);
	}

	/**
	 * Display the specified payroll.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$period = $id;
		
		$employees = Employee::all();

		return View::make('payrolls.show', compact('period', 'employees'));
	}

	/**
	 * Show the form for editing the specified payroll.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$period = $id;
		
		$employees = Employee::all();

		return View::make('payrolls.edit', compact('period', 'employees'));
	}

	/**
	 * Update the specified payroll in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$payroll = Payroll::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Payroll::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$payroll->update($data);

		return Redirect::route('payrolls.index');
	}

	/**
	 * Remove the specified payroll from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Payroll::destroy($id);

		return Redirect::route('payrolls.index');
	}



	public function payslip($id, $period)
	{
		$employee = Employee::find($id);

		$payments = DB::table('payrolls')->where('employee_id', '=', $employee->id)->where('month', '=', $period)->get();

		return View::make('payrolls.payslip', compact('employee', 'payments', 'period'));
	}

}
