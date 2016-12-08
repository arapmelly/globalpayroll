<?php

class Payroll extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public static function process($month, $year){

		Payroll::processBasicPay($month, $year);
		//process earnings
		Payroll::processEarning($month, $year);

		//process deductions
		Payroll::processDeduction($month, $year);
	}


	public static function processEarning($month, $year){

		$employees = Employee::all();

		foreach ($employees as $employee) {
			
			$earnings = DB::table('salaries')->where('category', '=', 'earning')->where('start_month', '=', $month)->where('payroll_year', '=', $year)->where('employee_id', '=', $employee->id)->get();

			foreach($earnings as $earning){

				$payroll = new Payroll;
				$payroll->employee_id = $earning->employee_id;
				$payroll->month = $month;
				$payroll->year = $year;
				$payroll->category = 'earning';
				$payroll->type = $earning->type;
				$payroll->value = $earning->value;
				$payroll->save();
			}

		}

		

	}


	public static function processDeduction($month, $year){

		//process tax
		//Payroll::processTax($month, $year);

		Payroll::processStatutory($month, $year);

		//process social security
		//Payroll::processSocialSecurity($month, $year);

		//process hospital insurance
		//Payroll::processHospitalInsurance($month, $year);


		//process tax
		Payroll::processOtherDeduction($month, $year);

		
	}


	public static function processOtherDeduction($month, $year){



		$employees = Employee::all();

		foreach ($employees as $employee) {
			
			$deductions = DB::table('salaries')->where('category', '=', 'deduction')->where('start_month', '=', $month)->where('payroll_year', '=', $year)->where('employee_id', '=', $employee->id)->get();

			foreach($deductions as $deduction){

				$payroll = new Payroll;
				$payroll->employee_id = $deduction->employee_id;
				$payroll->month = $month;
				$payroll->year = $year;
				$payroll->category = 'deduction';
				$payroll->type = $deduction->type;
				$payroll->value = $deduction->value;
				$payroll->save();
			}

		}

	}




	public static function processStatutory($month, $year){

		$employees = Employee::all();

		foreach ($employees as $employee) {
			$country = DB::table('countries')->where('is_default', '=', true)->pluck('name');

			$stats = DB::table('rates')->where('country', '=', $country)->where('is_disabled', '=', false)->get();



			foreach ($stats as $stat) {
				
				if($stat->charged_on == 'total_earning'){
					$amount = Payroll::getGross($month, $year, $employee);
				} elseif ($stat->charged_on == 'basic_pay') {
					$amount = $employee->basic_pay;
				}


				$scales = DB::table('ratescales')->where('rate_id', '=', $stat->id)->get();

				foreach($scales as $scale){

					if($amount >= $scale->lower_limit && $amount <= $scale->upper_limit){
						$payroll = new Payroll;
						$payroll->employee_id = $employee->id;
						$payroll->month = $month;
						$payroll->year = $year;
						$payroll->category = 'deduction';
						$payroll->type = $stat->name;
						if($stat->type == 'percenatge'){
							$payroll->value = $scale->value * $amount;
						}elseif ($stat->type == 'constant_amount') {
							$payroll->value = $scale->value;
						}
						$payroll->save();
					} 
				}

			}


		}


	}




	public static function getGross($month, $year, $employee){

		$gross = DB::table('salaries')->where('category', '=', 'earning')->where('start_month', '=', $month)->where('payroll_year', '=', $year)->where('employee_id', '=', $employee->id)->sum('value');

		return $gross;
	}

	public static function processBasicPay($month, $year){



	
			
			$employees =Employee::all();

			foreach ($employees as $employee) {
				
				

					$payroll = new Payroll;
					$payroll->employee_id = $employee->id;
					$payroll->month = $month;
					$payroll->year = $year;
					$payroll->category = 'earning';
					$payroll->type = 'basic pay';
					$payroll->value = $employee->basic_pay;
					$payroll->save();
					

			}
			

		

	}



	public static function getScaleValue($scale, $amount){

		$rate = Rate::find($scale->rate_id);
		

		if($rate->type == 'percenatge'){

			$value = $scale->value * $amount;
			return $value;
		} elseif ($rate->type == 'constant_amount') {
			$value = $scale->value;
			return $value;
		}

		
	}


}