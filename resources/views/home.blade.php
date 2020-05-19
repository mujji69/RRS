@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

<div class="basha">

</div>
@endsection
