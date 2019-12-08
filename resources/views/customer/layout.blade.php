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
                         @if($array[0] == null)
                         <h4>None Available</h4>
                         @endif
                         @if($array[0] != null)
                        
                         <label for="tableNo" class="col-form-label text-md-right">Table:</label>

                            <div class="col-md-3 float-left">
                                 <select name="tableNo" id="tableNo" class='form-control' onchange="myFunction()">
                                 <option></option>
                                 @php $count = count($array) @endphp
                                 @for($i=0;$i < $count ;$i++)
                                 
                                 <option>{{$array[$i]}}</option>
                                 @endfor
                                 
                                 </select>                       
                            </div>
                         @endif
                        
                            
                            <div class='' style='padding-left:250px;'>
                                <a href="{{url('book',$datas['id'])}}" class='float-right btn btn-primary'>Change Reservation Details</a>
                            </div>
                        
                        </div>
                            @if($array[0] != null)
                            <div class='form-group pt-4 text-center'>
                             <!-- details -->
                            <a type='button' class='btn btn-success' data-toggle="modal" data-target="#myModal2">
                                Reserve
                            </a>
                            
                             <!-- The Modal -->
                             <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Confirm Booking</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                           <form>
                                                <div class="form-group row">
                                                    <label for="rest" class="col-sm-4 col-form-label">Restaurant Name</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control-plaintext" id="rest" value="{{$rest->name}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="date" class="col-sm-4 col-form-label">Date</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control-plaintext" id="date" value="{{$datas['date']}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="time" class="col-sm-4 col-form-label">Time</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control-plaintext" id="time" value="{{$datas['time']}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="persons" class="col-sm-4 col-form-label">No Of Persons</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control-plaintext" id="persons" value="{{$datas['persons']}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="table" class="col-sm-4 col-form-label">Table No</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control-plaintext" id="table" value="">
                                                    </div>
                                                </div>
                                                
                                            </form>

                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>                                       
                                        <button type="submit" class="btn btn-success" >Reserve</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>    
                                @endif
                            <!-- end of details -->

                            
                            <!-- <button class='btn btn-success'><h3>Reserve</h3></button> -->
                        </div>
             </div>
        </div>

    </div>
</form>

<script>
function myFunction() {
  var mylist = document.getElementById("tableNo");
  document.getElementById("table").value = mylist.options[mylist.selectedIndex].text;
}
var total = $('.total').find($('div'));
console.log(total.length);
</script>
</div>
@endsection