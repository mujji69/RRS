@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

<div class="basha">

</div>
@endsection
