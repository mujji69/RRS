@extends('layouts.app')

@section('content')
<div class='float-right pr-4 py-4'>
    <a href="{{url('home')}}">Home </a>/<a href="{{url('restaurants')}}" active> Restaurants</a>
</div>

<div class='container pt-4'>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                
            </tr>
        </thead>
        
        <tbody>
        @foreach($datas as $data)
            <tr>
                <td><a href="{{url('book',$data->id)}}">{{$data->name}}</a></td>
                <td>{{$data->address}}</td>
                
            </tr>
            @endforeach    
        </tbody>
        
    </table>
</div>
@endsection