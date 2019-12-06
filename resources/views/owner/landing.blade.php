@extends('layouts.app')

@section('content')

@if($datas == null)
<div class='container'>
    
         <div class='text-center' style="padding-top:300px;">
              <a style='' class='btn btn-primary ' href="{{url('kedit')}}"><h3><b> Create Layout</b></h3></a>
         </div>

</div>
@endif

@endsection