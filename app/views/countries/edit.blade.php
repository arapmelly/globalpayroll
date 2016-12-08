@extends('layouts.admin')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">





     <form method="POST" action="{{{ URL::to('countries/update/'.$country->id) }}}" accept-charset="UTF-8">

       
   
    <fieldset>
        
        

        <div class="form-group">
            <label for="username">Country</label>
            <input class="form-control"  type="text" name="name" id="name" value="{{$country->name}}">
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
