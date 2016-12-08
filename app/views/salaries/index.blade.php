@extends('layouts.main')
@section('content')

<br>
<div class="row">
    


    <div class="col-lg-5">
    <h4> {{$type}}s</h4>  
</div>

</div>
<hr>    
		
										


<div class="row">
	


	<div class="col-lg-12">

@if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
	<div class="panel panel-default">
      <div class="panel-heading">
         <a href="{{URL::to('salaries/create/'.$type)}}" class="btn btn-primary">new {{$type}}</a>
        </div>
        <div class="panel-body">

		  <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Employee </th>
        <th>Description </th>
        <th>Start Period</th>
        <th>End Period</th>
        <th>Amount</th>
        

        <th></th>
        

      </thead>
      <tbody>

      <?php $i = 0; ?>
      @foreach($salaries as $salary)
      @if($salary->category == $type)
      <tr>
      	<td>{{$i}}</td>
      	<td>{{Employee::getEmployeeName($salary->employee_id)}}</td>
      	<td>{{$salary->type}}</td>
        <td>{{$salary->start_month}}</td>
        <td>{{$salary->end_month}}</td>
        <td>{{$salary->value}}</td>
      	<td>

      			<div class="btn-group">
  								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    								Action <span class="caret"></span>
  								</button>
  				
  								<ul class="dropdown-menu" role="menu">
    								<li><a href="{{URL::to('salaries/edit/'.$salary->id)}}">Edit</a></li>

    								
    								<li><a href="{{URL::to('salaries/delete/'.$salary->id)}}">Delete</a></li>

                    <li><a href="{{URL::to('salaries/disable/'.$salary->id)}}">Disable</a></li>
  								</ul>
							</div>

      	</td>

      </tr>
      @endif
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
@stop
