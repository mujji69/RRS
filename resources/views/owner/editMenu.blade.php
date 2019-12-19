@extends('layouts.app')


@section('content')
<div class="container pt-4">

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif


    <div class="card">
        <div class="card-header">Edit Menu</div>

        <div class="card-body">
            <div class="row">
           <div class="col-md-6">
            @foreach($datas as $data)
           <div>
           <a target="_blank" href="/storage/menus/{{$data->images}}">
             <img class='image' src="/storage/menus/{{$data->images}}" alt="Forest" style="width:150px">
           </a>
            <a href="" class='pl-3' style='color:red;' data-toggle="modal" data-target="#myModal1">remove</a>
           
                          <!-- The Modal -->
                                <div class="modal fade" id="myModal1">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <h4 class="text-center">
                                                Are you sure you want to delete this?
                                            </h4>
                                      </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>

                                            <form action="{{url('removeMenu',$data->id)}}" method='POST'>
                                                @csrf
                                                <button class='btn btn-danger' type='submit'>Yes, Remove</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>    
                            
           
           </div>      
            @endforeach
            </div>
            <div class="col-md-4">
            <form action="{{url('updateMenu')}}" method='POST' enctype='multipart/form-data'>
                @csrf
            <input type="file" name='file[]' multiple>
            <div class='pt-4'>
            <button type='submit' class='btn btn-primary'>ADD</button>
            </div>
            </form>
            </div>
            </div>
        </div>
</div>

@endsection