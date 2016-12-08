@extends('layouts.main')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-12">

        @if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
	<div class="panel panel-default">
      <div class="panel-heading">
         Payroll for : {{$period}}
        </div>
        <div class="panel-body">

		  <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Employee Number</th>

        <th>Employee Name</th>
        <th>Basic Pay</th>
        <th>Earnings</th>
        <th>Deductions</th>
        <th>Gross</th>
        <th>Net</th>

        <th></th>
        

      </thead>
      <tbody>

      <?php $i = 1; ?>
      @foreach($employees as $employee)
      <tr>
      	<td>{{$i}}</td>
      	<td>{{$employee->id_number}}</td>
      	<td>{{$employee->fullname}}</td>
        <td>{{$employee->basic_pay}}</td>
        <td>{{Employee::getEarnings($employee->id, $period)}}</td>
        <td>{{Employee::getDeductions($employee->id, $period)}}</td>
        <td>
          {{ $employee->basic_pay + Employee::getEarnings($employee->id, $period)  }}
        </td>
         <td>
          {{ $employee->basic_pay + Employee::getEarnings($employee->id, $period) - Employee::getDeductions($employee->id, $period) }}
        </td>
      	<td>

      			<div class="btn-group">
  								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    								Action <span class="caret"></span>
  								</button>
  				
  								<ul class="dropdown-menu" role="menu">
    								<li><a href="{{URL::to('payrolls/payslip/'.$employee->id.'/'.$period)}}">View Payslip</a></li>

    								
    								
  								</ul>
							</div>

      	</td>

      </tr>
      <?php $i++; ?>
      @endforeach

      </tbody>


    </table>
</div>
</div>

	</div>	


<div class="row">

	<div class="col-lg-12">
		<hr>
	</div>	

	

	
</div>
@stop
