@extends('layouts.admin')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-12">

        @if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif


	</div>	


<div class="row">

	<div class="col-lg-4">
		<hr>

    <table class="table table-responsive table-condensed table-bordered">

      <tr>
        <td>XARA PAYROLL</td>
      </tr>
       <tr>
        <td>V. 3.4.10</td>
      </tr>

    </table>
	</div>	

	

	
</div>
@stop
