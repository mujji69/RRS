@extends('layouts.app')
<link href="{{ asset('css/owner.css') }}" rel="stylesheet">

@section('content')

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

@if($datas == null)
<div class='container'>
    
         <div class='text-center' style="padding-top:300px;">
              <a style='background-color:black;' class='btn btn-primary btn-lg' href="{{url('kedit')}}"><h3><b> Create Layout</b></h3></a>
         </div>

</div>
@endif

@endsection