@extends('layouts.admin')
@section('content')

<br><br>
    
                    


<div class="row">
  


  <div class="col-lg-12">

        @if(Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
        
  <div class="panel panel-default">
      <div class="panel-heading">
         <a href="{{URL::to('countries/create')}}" class="btn btn-primary">new country</a>
        </div>
        <div class="panel-body">

      <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Name</th>

        
        <th></th>
        

      </thead>
      <tbody>

      <?php $i = 1; ?>
      @foreach($countries as $country)
      <tr>
        <td>{{$i}}</td>
        <td>{{$country->name}}</td>
      
        <td>

            <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('countries/edit/'.$country->id)}}">Edit</a></li>

                    
                    <li><a href="{{URL::to('countries/delete/'.$country->id)}}">Delete</a></li>
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



@stop
