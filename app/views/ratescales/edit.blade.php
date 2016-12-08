@extends('layouts.main')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">





     <form method="POST" action="{{{ URL::to('ratescales/update/'.$ratescale->id) }}}" accept-charset="UTF-8">

       
   
    <fieldset>
        
        

        
         <div class="form-group">
            <label for="username">Lower Limit</label>
            <input class="form-control"  type="text" name="lower_limit" id="lower_limit" value="{{$ratescale->lower_limit}}">
        </div>


        <div class="form-group">
            <label for="username">Upper Limit</label>
            <input class="form-control"  type="text" name="upper_limit" id="upper_limit" value="{{$ratescale->upper_limit}}">
        </div>


        <div class="form-group">
            <label for="username">Value</label>
            <input class="form-control"  type="text" name="value" id="value" value="{{$ratescale->value}}">
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
