
@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

<form class='pb-4' method="POST" action="{{ route('updateProfile')}}" enctype='multipart/form-data'>


<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restaurant Information</div>

                <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name" autofocus>

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
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $data->city }}" required autocomplete="name" autofocus>

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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $data->address }}" required autocomplete="name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-header">Handler Information</div>

                <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email">

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
                                <input id="phone" type="tel" pattern='[0-9]*' class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $data->phone }}" required autocomplete="name" autofocus>
                                <small style='color:grey;'>Eg: 03310272753</small>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                </div>
            </div> -->

        </div>
        <div class='col-md-4'>
              
            
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                <div class='pt-4'>
            <!-- days open -->
                <h4><strong>Days Open</strong></h4>
                
                    <div class="form-check">
                        <label class="form-check-label">
                            <input  type="checkbox" class="form-check-input text-center" name='1' value="monday" @foreach($days as $day) @if($day->day == 'monday') checked @endif @endforeach >Monday
                        </label>
                </div>
                
                <div class="form-check center">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='2' value="tuesday" @foreach($days as $day) @if($day->day == 'tuesday') checked @endif @endforeach >Tuesday
                </label>
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='3' value="wednesday" @foreach($days as $day) @if($day->day == 'wednesday') checked @endif @endforeach >Wednesday
                </label>
                
                </div> 

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='4' value="thursday" @foreach($days as $day) @if($day->day == 'thursday') checked @endif @endforeach >Thursday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='5' value="friday" @foreach($days as $day) @if($day->day == 'friday') checked @endif @endforeach >Friday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='6' value="saturday" @foreach($days as $day) @if($day->day == 'saturday') checked @endif @endforeach >Saturday
                </label>
                
                </div>

                <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name='7' value="sunday" @foreach($days as $day) @if($day->day == 'sunday') checked @endif @endforeach >Sunday
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
                    <input class='form-control' id='from' type="time" name='from' value = '{{$data->open_from}}'>
                    </div>

                </div>

                <div class='form-group row'>
                    <label class='col-md-4 col-form-label text-md-right' for="to">To:</label>
                    <div class="col-md-6">
                    <input class='form-control' id='to' type="time" name='to' value = '{{$data->open_to}}'>
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
                                    <h4>{{ __('Update') }}</h4>
                                </button>
                            </div>
                        </div>       
            </div>
    </div>
</div>
</form>

@endsection

