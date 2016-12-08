@extends('layouts.admin')
@section('content')

<br><br>

<div class="row">
  


  <div class="col-lg-12">
    <h4>{{ucfirst($country->name)}}</h4>

<hr>
  </div>

</div>
										


<div class="row">
	


	<div class="col-lg-12">

@if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif



	<div class="panel panel-default">
      <div class="panel-heading">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  new rate
</button>
        </div>
        <div class="panel-body">

		  <table id="users" class="table table-condensed table-bordered table-responsive table-hover">





      <thead>

        <th>#</th>
        <th>Name</th>

        <th>Charged on</th>
        

        <th></th>
        

      </thead>
      <tbody>

      <?php $i = 1; ?>
      @foreach($rates as $rate)
      <tr>
      	<td>{{$i}}</td>
      	<td>{{$rate->name}}</td>
      	<td>{{$rate->charged_on}}</td>
        
      	<td>

      			<div class="btn-group">
  								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    								Action <span class="caret"></span>
  								</button>
  				
  								<ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('ratescales/create/'.$rate->id)}}">View</a></li>

    								<li><a href="{{URL::to('rates/edit/'.$rate->id)}}">Edit</a></li>

    								
    								<li><a href="{{URL::to('rates/delete/'.$rate->id)}}">Delete</a></li>
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
        
        <input class="form-control"  type="hidden" name="country" id="country" value="{{$country->name}}">

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
