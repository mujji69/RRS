@extends('layouts.app')

@section('content')
<div class='container pt-4'>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif


<table id="example" class="display" style="width:100%">
        <thead>
           
                <tr>
    
                <th>#</th>
                <th>CustomerID</th>
                <th>RestaurantID</th>
                <th>Date</th>
                <th>Time</th>
                <th>No Of Persons</th>
                <th>Table No</th>
                <th>Remove</th>  
            </tr>
        </thead>
        
        <tbody>

        @foreach($datas as $data)        
            <tr>
                <td>1</td>
                <td>{{$data->user_id}}</td> 
                <td>{{$data->owner_id}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->no_of_persons}}</td>
                <td>{{$data->table_no}}</td>
                
                <td>
                <!-- photos -->
                            <button type='button' class='btn btn-danger' data-toggle="modal" data-target="#myModal1">
                                Remove
                            </button>
                            
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

                                            <form action="{{url('destroy',$data->id)}}" method='POST'>
                                                @csrf
                                                <button class='btn btn-danger' type='submit'>Yes, Remove</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>    
                            
                            <!-- end of delete -->



                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection