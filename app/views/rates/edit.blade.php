@extends('layouts.admin')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">





     <form method="POST" action="{{{ URL::to('rates/update/'.$rate->id) }}}" accept-charset="UTF-8">

       
   
    <fieldset>
        
        

        
        <div class="form-group">
            <label for="username">Name</label>
            <input class="form-control"  type="text" name="name" id="name" value="{{$rate->name}}">
        </div>

        <div class="form-group">
            <label for="username">Charged on</label>
            <select class="form-control" name="charged_on">
                <option value="{{$rate->charged_on}}" selected="selected">{{$rate->charged_on}}</option>
              <option value="basic_pay">Basic Pay</option>
              <option value="total_earning">Total Earnings</option>
            </select>
        </div>


        <div class="form-group">
            <label for="username">Calculation</label>
            <select class="form-control" name="type">
                 <option value="{{$rate->type}}" selected="selected">{{$rate->type}}</option>
              <option value="percentage">Percentage</option>
              <option value="constant_amount">Constant Amount</option>
            </select>
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
        
          <button type="submit" class="btn btn-primary btn-sm">update </button>
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
