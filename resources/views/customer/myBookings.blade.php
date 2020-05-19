@extends('layouts.app')
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">

@section('content')
<div class='container pt-4'>

<table id="example" class="display" style="width:100%">
        <thead>
           
                <tr>
    
                
                <th>CustomerID</th>
                <th>Restaurant Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>No Of Persons</th>
                <th>Table No</th>  
            </tr>
        </thead>
        
        <tbody>

        @foreach($datas as $data)        
            <tr>
                
                <td>{{$data->user_id}}</td> 
                <td>{{$data->owner_id}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->no_of_persons}}</td>
                <td>{{$data->table_no}}</td>
                
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection