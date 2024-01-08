@extends('layouts.app')

@section('content')

@if(auth()->check() && auth()->user()->roles->name === 'patient')
    <!-- Content for patients when logged in -->
    <section class="container">
        <!-- Search Dentist Form -->
        <form action="{{url('/')}}" method="GET" class="mb-3">
            <div class="card">
                <div class="card-header">Search Date to Book Appointment</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="datepicker" name="date">
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Dentists Table -->
        <div class="card">
            <div class="card-header">Dentist Available on Today</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dentists as $dentist)
                                <tr>
                                    <td>1</td>
                                    <td><img src="{{asset('images')}}/{{$dentist->dentist->image}}" width="50" height="50" style="border-radius: 50%;"></td>
                                    <td>{{$dentist->dentist->name}}</td>
                                    <td>
                                        <a href="{{route('create.appointment',[$dentist->user_id,$dentist->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Dentist Available on This Date</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@else
    <!-- Content for users who are not logged in or don't have the 'patient' role -->
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    </head>

    <body style="background: url('{{ asset('banner/background.png') }}') no-repeat center center fixed; background-size: cover; overflow: auto;">

        <div style="height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%; margin-bottom: 20px;">
                <img src="{{ asset('banner/logo.png') }}" alt="Klinik Logo" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="text-align: center;">
                <h1 style="color: #333; font-family: 'Poppins', sans-serif; font-size: 50px; margin-bottom: 20px;">KLINIK PERGIGIAN SYARIFAH</h1>
            </div>
        </div>

        <hr>

        <section class="container">
            <!-- Search Dentist Form -->
            <form action="{{url('/')}}" method="GET" class="mb-3">
                <div class="card">
                    <div class="card-header">Search Date to Book Appointment</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="datepicker" name="date">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Dentists Table -->
            <div class="card">
                <div class="card-header">Dentist Available on Today</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dentists as $dentist)
                                    <tr>
                                        <td>1</td>
                                        <td><img src="{{asset('images')}}/{{$dentist->dentist->image}}" width="50" height="50" style="border-radius: 50%;"></td>
                                        <td>{{$dentist->dentist->name}}</td>
                                        <td>
                                            <a href="{{route('create.appointment',[$dentist->user_id,$dentist->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Dentist Available on This Date</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </body>
@endif

@endsection
