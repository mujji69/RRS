
@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

<form class='pb-4' method="POST" action="{{ url('owner/register') }}" enctype='multipart/form-data'>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurant Information</div>

                <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="name" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">Handler Information</div>

                <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" pattern='[0-9]*' class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
                                <small style='color:grey;'>Eg: 03310272753</small>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                </div>
            </div>

        </div>
        <div class='col-md-4'>
             <div class='card'>
                <div class='card-header'>
                    Restaurant's Photos and Menu        
                </div>
                <div class='card-body'>
                    <div class='form-group row'>
                            <div class='col-md-12 text-center'>
                            <!-- photos -->
                            <button type='button' class='btn btn-primary' data-toggle="modal" data-target="#myModal1">
                                Add Photos
                            </button>
                            
                             <!-- The Modal -->
                             <div class="modal fade" id="myModal1">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Add Photos</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="file" name='photo[]' multiple>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Add</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>    
                            
                            <!-- end of photos -->

                            <!-- menu -->
                            
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Add Menu
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Add Menu</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="file" name='file[]' multiple>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Add</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                
                                
                                                            
                            <!-- end of menu -->
                            </div>
                        </div> 
                    
                </div>
            </div> 
            
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                <div class='pt-4'>
            <!-- days open -->
                <h4><strong>Days Open</strong></h4>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input text-center" name='1' value="monday">Monday
                        </label>
                </div>

                <div class="form-check center">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='2' value="tuesday">Tuesday
                </label>
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='3' value="wednesday">Wednesday
                </label>
                
                </div> 

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='4' value="thursday" >Thursday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='5' value="friday" >Friday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='6' value="saturday" >Saturday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='7' value="sunday">Sunday
                </label>
                
                </div>

                </div>
                    <!-- end days -->

            <!-- timings -->
            <div class='pt-4'>
                <h4><strong>Timings:</strong></h4>
                <div class='form-group row'>
                    <label class='col-md-4 col-form-label text-md-right' for="from" class=''>From:</label>
                    <div class="col-md-6">
                    <input class='form-control' id='from' type="time" name='from'>
                    </div>

                </div>

                <div class='form-group row'>
                    <label class='col-md-4 col-form-label text-md-right' for="to">To:</label>
                    <div class="col-md-6">
                    <input class='form-control' id='to' type="time" name='to'>
                    </div>
                </div>

            </div>
            <!-- end of timings -->
    
                </div>
            </div>
               
                        
        </div>
            <div class='col-md-12 py-4'>
                        <div class="form-group row mx-auto">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mx-auto">
                                    <h4>{{ __('Register') }}</h4>
                                </button>
                            </div>
                        </div>       
            </div>
    </div>
</div>
</form>

@endsection

