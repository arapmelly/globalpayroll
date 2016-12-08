@extends('layouts.main')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">





     <form method="POST" action="{{{ URL::to('employees/update/'.$employee->id) }}}" accept-charset="UTF-8">

       
   
    <fieldset>
        
        

        <div class="form-group">
            <label for="username">Employee Number</label>
            <input class="form-control"  type="text" name="employee_number" id="employee_number" value="{{$employee->id_number}}">
        </div>

        <div class="form-group">
            <label for="username">Full Name</label>
            <input class="form-control"  type="text" name="fullname" id="fullname" value="{{$employee->fullname}}">
        </div>

         <div class="form-group">
            <label for="username">Email</label>
            <input class="form-control"  type="text" name="email" id="email" value="{{$employee->email}}">
        </div>

        <div class="form-group">
            <label for="username">Basic Pay</label>
            <input class="form-control"  type="text" name="basic_pay" id="basic_pay" value="{{$employee->basic_pay}}">
        </div>
       
       

        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        







        
      
        
        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Update </button>
        </div>

    </fieldset>
</form>
    





  </div>

</div>	


<div class="row">

	<div class="col-lg-12">
		<hr>
	</div>	

	

	
</div>
@stop
