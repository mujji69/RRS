@extends('layouts.app')

@section('content')
<div class='container pt-4'>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif


<table id="example" class="display" style="width:100%">
        <thead>
           
                <tr>
    
                <th>#</th>
                <th>CustomerID</th>
                <th>RestaurantID</th>
                <th>Date</th>
                <th>Time</th>
                <th>No Of Persons</th>
                <th>Table No</th>
                <th>Remove</th>  
            </tr>
        </thead>
        
        <tbody>

        @foreach($datas as $data)        
            <tr>
                <td>1</td>
                <td>{{$data->user_id}}</td> 
                <td>{{$data->owner_id}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->no_of_persons}}</td>
                <td>{{$data->table_no}}</td>
                
                <td>

                 <form action="{{url('destroy',$data->id)}}" method='POST'>
                 @csrf
              
                <button class='btn btn-danger' type='submit'>Remove</button>
                </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection