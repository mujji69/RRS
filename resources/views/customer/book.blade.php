@extends('layouts.app')

@section('content')
<!-- <style>
.co a{
    color:black;
}
</style> -->
<div class='float-right pr-4 pt-4 co' >
    <a href="{{url('home')}}">Home </a>
    /<a href="{{url('restaurants')}}"> Restaurants</a>
    /<a href="{{url('book',$data->id)}}" active> Details</a>
</div>

<div class='bg'>
    <div class='container' style='padding-top:150px;'>  
    @if ($message = Session::get('message'))
      <div class="alert alert-danger">
        <p>{{$message}}</p>
      </div>
    @endif  
        <div class='card'>
            <div class='card-header'><h4><strong>{{$data->name}}</strong></h4></div>
                <div class='card-body' style='height:250px;'>
                    <div class="float">
                    
                    <!-- photos -->

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">
                        View Photos
                    </button>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        
                        
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            
                        <!-- carousel -->
                        <div id="demo1" class="carousel slide" data-ride="carousel">
                    <!-- <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul> -->
                    <div class="carousel-inner">
                         @foreach($photos as $photo)
                        <div class="carousel-item photo">
                        <img src="/storage/photos/{{$photo->photo}}" alt="Los Angeles" width="1100" height="500">
                        <div class="carousel-caption">
                                                    
                        </div>   
                        </div>
                        @endforeach  
                          
                    </div>
                    <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo1" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    </div>

                    <!-- end of carousel -->     

                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>

                    <!-- end of photos -->
                    
                    <!-- menu -->

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Menu
                    </button>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        
                        
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            
                        <!-- carousel -->
                        <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul> -->
                    <div class="carousel-inner">
                         @foreach($images as $image)
                        <div class="carousel-item menu">
                        <img src="/storage/menus/{{$image->images}}" alt="Los Angeles" width="1100" height="500">
                        <div class="carousel-caption">
                                                    
                        </div>   
                        </div>
                        @endforeach  
                          
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    </div>

                    <!-- end of carousel -->     

                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>

                    <!-- end of menu -->

                     <!-- details -->
                     <button type='button' class='btn btn-success' data-toggle="modal" data-target="#myModal2">
                                Details
                            </button>
                            
                             <!-- The Modal -->
                             <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Details</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body d-flex justify-content-between">
                                            <div>
                                                <h4>Timings</h4>
                                                <label for="from">From:</label>
                                                <p id='from'>{{$data->open_from}}</p>
                                                <label for="to">To:</label>
                                                <p id='to'>{{$data->open_to}}</p>
                                            </div>
                                            <div>
                                                <h4>Days Open</h4>
                                                @foreach($days as $day)
                                                <p>{{$day->day}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>    
                            
                            <!-- end of details -->


                    </div>    
                    <form action="{{url('layout')}}" method='GET'>
                    @csrf
                    <div class="form-group inp pt-4">
                        <input type="hidden" name = 'id' value={{$data->id}}>
                        <label class='pl-4' for="date">Choose Date:</label>
                        <input class='col-md-2' id='date' type="date" name='date' value="{{ old('date') }}" required>
                        
                        <label class='pl-4' for="time">Choose Time:</label>
                        <input class='col-md-2' id='time' type="time" name='time' value="{{ old('time') }}" required>
                        
                        <label class='pl-4' for="persons">No. Of Persons:</label>
                        <input class='col-md-2' id='persons' type="number" name='persons' value="{{ old('persons') }}" min='1' required>
                        
                   </div>
                    
                    <div class='text-center pt-4'>
                        <button class='btn btn-primary' type='submit'>Check Availablity</button>
                   </div>
                   </form>

                   
            </div>
        </div>
    </div>    
    <!-- <img src="/images/zoro.jpg" alt="" id='hide'> -->

</div>
<div class='hide' id='total'>{!!$lay!!}</div>

<script>
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

document.getElementById('date').setAttribute('min',today);

$('.menu').first().addClass('active')
$('.photo').first().addClass('active')
$('.hide').hide();
var total = $('#total').find($('p'));
console.log(total.length);

$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

$.ajax({

type:'POST',

url:"{{ route('total') }}",

data:{
    _token: "{{ csrf_token() }}",
     total: total.length,
        id: {{$data->id}}
    },

success:function(data){
// window.location.href = "{{ route('store') }}";
 console.log(data.success);
 console.log('jawan');
},
error:function(data){

    console.log(data);
}

});


</script>
@endsection