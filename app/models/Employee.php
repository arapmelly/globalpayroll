<?php

class Employee extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public static function getEmployeeName($id)
{

	$employee = Employee::find($id);
	return $employee->fullname;
}


public static function getEarnings($employee_id, $month){

	$year = date('Y');

	$gross = DB::table('payrolls')->where('category', '=', 'earning')->where('month', '=', $month)->where('year', '=', $year)->where('employee_id', '=', $employee_id)->sum('value');

	return $gross;

}


public static function getDeductions($employee_id, $month){

	$year = date('Y');
	
	$gross = DB::table('payrolls')->where('category', '=', 'deduction')->where('month', '=', $month)->where('year', '=', $year)->where('employee_id', '=', $employee_id)->sum('value');

	return $gross;

}


/*public static function getGrossPay($employee_id, $month){

	$year = date('Y');
	
	$gross = DB::table('payrolls')->where('category', '=', 'earning')->where('month', '=', $month)->where('year', '=', $year)->where('employee_id', '=', $employee_id)->sum('value');

	return $gross;

}


public static function getNet($employee_id, $period){

	

	$gross = Payroll::getGross($employee_id, $period);
	$deduction = Payroll::getDeductions($employee_id, $period);
	
	
	return $gross- $deduction;

}*/




}