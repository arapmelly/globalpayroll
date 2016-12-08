@extends('layouts.main')
@section('content')


<h4>Process Payroll</h4>
<hr>
<form method="POST" action="{{{ URL::to('payrolls') }}}" accept-charset="UTF-8">

     
<div class="row">

  <div class="col-lg-5">



   
    <fieldset>
        
        

       <div class="form-group">
            <label for="username"> Period </label>
            <select class="form-control" name="month" >
                @foreach($months as $month)
                    <option value="{{$month}}">{{$month}}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="year" value="{{date('Y')}}">


        <div class="form-group">
            
            <button class="btn btn-default" type="submit">Process Payroll</button>
        </div>
       
  </div>  

  

  
</div>
<hr>
<div class="row">

	<div class="col-lg-10">

    
       
	</div>	

	

	
</div>

</form>


@stop
