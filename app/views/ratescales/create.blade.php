@extends('layouts.admin')
@section('content')

<br><br>
		
										


<div class="row">
	


	<div class="col-lg-5">





     <table class="table table-bordered table-condensed table-responsive">

         <tr>
            <td>Country</td>
            <td>{{ucfirst($rate->country)}}</td>
        </tr>

        <tr>
            <td>Name</td>
            <td>{{$rate->name}}</td>
        </tr>
         <tr>
            <td>Charged on</td>
            <td>{{$rate->charged_on}}</td>
        </tr>

     </table>





  </div>

</div>	

<hr>
<div class="row">

	<div class="col-lg-10">

        <div class="panel panel-default">
      <div class="panel-heading">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#createModal">
  new scale
</button>
        </div>
        <div class="panel-body">

          <table  class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Lower Limit</th>
        <th>Upper Limit</th>

        <th>Value</th>
        

        <th></th>
        

      </thead>
      <tbody>

      <?php $i = 1; ?>
      @foreach($ratescales as $scale)
      <tr>
        <td>{{$i}}</td>
        <td>{{$scale->lower_limit}}</td>
         <td>{{$scale->upper_limit}}</td>
        <td>{{$scale->value}}</td>
        <td>

                <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{URL::to('ratescales/edit/'.$scale->id)}}">Edit</a></li>

                                    
                                    <li><a href="{{URL::to('ratescales/delete/'.$scale->id)}}">Delete</a></li>
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

	

	
</div>



<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Rate</h4>
      </div>
      <div class="modal-body">
        


         <form method="POST" action="{{{ URL::to('ratescales') }}}" accept-charset="UTF-8">

       <input type="hidden" name="rate_id" value="{{$rate->id}}">
   
    <fieldset>
        
        

        <div class="form-group">
            <label for="username">Lower Limit</label>
            <input class="form-control"  type="text" name="lower_limit" id="lower_limit" value="{{{ Input::old('lower_limit') }}}">
        </div>


        <div class="form-group">
            <label for="username">Upper Limit</label>
            <input class="form-control"  type="text" name="upper_limit" id="upper_limit" value="{{{ Input::old('upper_limit') }}}">
        </div>


        <div class="form-group">
            <label for="username">Value</label>
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
