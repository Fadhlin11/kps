@extends('layouts.app')

@section('content')
<div class="container mt-4">
<body style="background: url('{{ asset('banner/background.png') }}') no-repeat center center fixed; background-size: cover; overflow: auto;">

    <div class="row">
        <div class="col-md-4 mx-auto mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center" style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size: 24px; color: #333; letter-spacing: 1px; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">DENTIST</h4>
                    <img src="{{asset('images/' . $users->image)}}" style="width: 150px; height: 150px; border-radius: 50%; display: block; margin: auto;" alt="Dentist Image">
                    <br>
                    <p class="lead" style="font-family: 'Poppins', sans-serif; font-size: 14px;"> Dentist Name : {{ucfirst($users->name)}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-7 mx-auto mt-4">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            @if(Session::has('errmessage'))
            <div class="alert alert-danger">
                {{Session::get('errmessage')}}
            </div>
            @endif


            <form action="{{route('booking.appointment')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size: 14px;">Slots Appointment for <strong>{{$date}}</strong></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($slots as $slot)
                            <div class="col-md-3 mb-4">
                                <label class="btn btn-outline-success btn-block-custom">
                                    <input type="radio" name="slot" value="{{$slot->slot}}">
                                    <span>{{$slot->slot}}</span>
                                </label>
                            </div>
                            <input type="hidden" name="dentistId" value="{{$dentist_id}}">
                            <input type="hidden" name="appointmentId" value="{{$slot->appointment_id}}">
                            <input type="hidden" name="date" value="{{$date}}">

                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        @if(Auth::check())
                        <button type="submit" class="btn btn-success">Make Appointment</button>
                        @else
                            <p>Please login first to make an appointment</p>
                            <a href="/register">Register</a>&nbsp;
                            <a href="/login">Login</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
