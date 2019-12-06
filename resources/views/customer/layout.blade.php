@extends('layouts.app')

@section('content')
<style>
.co .act{
    color:black;
}
</style>
<div class='float-right pr-4 pt-4 co' >
    <a href="{{url('home')}}">Home </a>
    /<a href="{{url('restaurants')}}" > Restaurants</a>
    /<a href="{{url('book',$datas['id'])}}" > Details</a>
    /<a href="" class='act'> Layout</a>

</div>
<div>
<div class='flex-center position-ref full-height total'>
   {!!$content->layout!!}
</div>
<form action="{{url('reserve',$datas['id'])}}" method='POST'>
@csrf
    <div class='container pt-4'>
        @foreach($datas as $key => $data)
        <input type="hidden" name='{{$key}}' value='{{$data}}'>
        @endforeach
        
        <div class='card'style='width:800px;'>
             <div class="card-header">Avialable Tables</div>
             <div class="card-body" >
                         <div class="row pl-4">
                         
                         <label for="tableNo" class="col-form-label text-md-right">Table:</label>

                            <div class="col-md-3 float-left">
                                 <select name="tableNo" id="tableNo" class='form-control'>
                                 <option></option>
                                 @php $count = count($array) @endphp
                                 @for($i=0;$i < $count ;$i++)
                                 
                                 <option>{{$array[$i]}}</option>
                                 @endfor
                                 
                                 </select>                       
                            </div>

                        
                            <div class='' style='padding-left:250px;'>
                                <a href="{{url('book',$datas['id'])}}" class='float-right btn btn-primary'>Change Reservation Details</a>
                            </div>
                        </div>

                        <div class='form-group pt-4 text-center'>
                            <button class='btn btn-success'><h3>Reserve</h3></button>
                        </div>
             </div>
        </div>

    </div>
</form>

<script>
var total = $('.total').find($('div'));
console.log(total.length);
</script>
</div>
@endsection