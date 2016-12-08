@extends('layouts.admin')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">

@if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif


    
  @foreach($countries as $country)
  

    <table class="table table-bordered">
      <tr>
        <td>{{ucfirst($country->name)}}</td>
        <td>
    <a href="{{URL::to('countries/show/'.$country->id)}}">Manage</a>
  
    @if($country->is_default)
    <span class="badge badge-info">Default</span>
    @else
      
     | <a href="{{URL::to('countries/default/'.$country->id)}}">Make Default</a> </button>
    @endif
  </td>
</tr>
  </table>
    
  @endforeach
  




	

	</div>	


<div class="row">

	<div class="col-lg-12">
		<hr>
	</div>	

	

	
</div>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Rate</h4>
      </div>
      <div class="modal-body">
        


         <form method="POST" action="{{{ URL::to('rates') }}}" accept-charset="UTF-8">

       
   
    <fieldset>
        
        

        <div class="form-group">
            <label for="username">Name</label>
            <input class="form-control"  type="text" name="name" id="name" value="{{{ Input::old('name') }}}">
        </div>

        <div class="form-group">
            <label for="username">Charged on</label>
            <select class="form-control" name="charged_on">
              <option value="basic_pay">Basic Pay</option>
              <option value="total_earning">Total Earnings</option>
            </select>
        </div>


         <div class="form-group">
            <label for="username">Calculation</label>
            <select class="form-control" name="type">
              <option value="percentage">Percentage</option>
              <option value="flat">Constant Amount</option>
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

        
   

    </fieldset>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>

        </form>
      </div>
    </div>
  </div>
</div>


@stop
