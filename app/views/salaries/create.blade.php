@extends('layouts.main')
@section('content')

<br><br>
<div class="row">
    


    <div class="col-lg-5">
    <h4>New {{$type}}</h4>	
</div>

</div>
<hr>										


<div class="row">
	


	<div class="col-lg-5">





     <form method="POST" action="{{{ URL::to('salaries') }}}" accept-charset="UTF-8">

       
   <input type="hidden" name="category" value="{{$category}}"> 

   <input type="hidden" name="payroll_year" value="{{date('Y')}}"> 
    <fieldset>
        
        

        <div class="form-group">
            <label for="username">Employee </label>
            <select class="form-control" name="employee_id" >
                @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->fullname}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="username">Description</label>
            <input class="form-control"  type="text" name="type" id="type" value="{{{ Input::old('type') }}}">
        </div>

        @if($type != 'advance')
         <div class="form-group">
            <label for="username">Start Period </label>
            <select class="form-control" name="start_month" >
                @foreach($months as $month)
                    <option value="{{$month}}">{{$month}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="username">End Period </label>
            <select class="form-control" name="end_month" >
                @foreach($months as $month)
                    <option value="{{$month}}">{{$month}}</option>
                @endforeach
            </select>
        </div>
        @endif

         @if($type == 'advance')
         <div class="form-group">
            <label for="username"> Period </label>
            <select class="form-control" name="start_month" >
                @foreach($months as $month)
                    <option value="{{$month}}">{{$month}}</option>
                @endforeach
            </select>
        </div>
        @endif

         <div class="form-group">
            <label for="username">Amount</label>
            <input class="form-control"  type="text" name="value" id="value" value="{{{ Input::old('value') }}}">
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
        
          <button type="submit" class="btn btn-primary btn-sm">Create </button>
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
