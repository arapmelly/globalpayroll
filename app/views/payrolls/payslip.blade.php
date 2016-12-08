@extends('layouts.main')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">

        @if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif

      <table class="table table-bordered table-condensed">

        <tr>
          <td>Name</td><td>{{$employee->fullname}}</td>

        </tr>

        <tr>
          <td>Employee #</td><td>{{$employee->employee_no}}</td>

        </tr>

        <tr>
          <td>Period</td><td>{{$period.'-'.date('Y')}}</td>

        </tr>
        <tr>
          <td colspan="2"><strong>Earnings</strong></td>


        </tr>
        <?php $gross =0; ?> 

        @foreach($payments as $payment)
        @if($payment->category == 'earning')
         <tr>
          <td>{{$payment->type}}</td><td>{{$payment->value}}</td>

        </tr>

         <?php $gross = $gross + $payment->value; ?>
        @endif


        @endforeach

        <tr>
          <td><strong>Gross</strong></td><td>{{$gross}}</td>

        </tr>

        <tr>
          <td colspan="2"><strong>Deductions</strong></td>


        </tr>

<?php $deduction =0; ?> 
         @foreach($payments as $payment)
        @if($payment->category == 'deduction')
         <tr>
          <td>{{$payment->type}}</td><td>{{$payment->value}}</td>

        </tr>

        <?php $deduction = $deduction + $payment->value; ?>
        @endif
        @endforeach
         <tr>
          <td><strong>Nett Pay</strong></td><td>{{$gross - $deduction}}</td>

        </tr>


      </table>

	

	</div>	


<div class="row">

	<div class="col-lg-12">
		<hr>
	</div>	

	

	
</div>
@stop
