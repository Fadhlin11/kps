
@extends('admin.layouts.master')

@section('content')
<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                          <h5>Dentist</h5>
                                            <span>Check & Update Appointment Slot</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">Dentist</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
<div class="container">
    @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white">
            {{Session::get('errmessage')}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <form action="{{route('appointment.check')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            Choose Date
            <br>
            @if(isset($date))
                Your Schedule/Timetable for: 
                {{$date}}
            @endif
        </div>
        <div class="card-body">
            <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        <br>
        <button type="submit" class="btn btn-primary">Check</button>
        </div>
    </div>
</form>
@if(Route::is('appointment.check'))
<form action="{{route('appointment.update')}}" method="post">@csrf
    <div class="card">
        <div class="card-header">
            Select All Time Slots
        </div>
        <div class="card-body">
            <td><input type="checkbox" onclick="for(c in document.getElementsByName('slot[]')) document.getElementsByName('slot[]').item(c).checked=this.checked">All Slots</td>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Choose AM Time Slot
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <input type="hidden" name="appointmentId" value="{{$appointmentId}}">
                <tr>
                <td scope="row">1</td>
                <td><input type="checkbox" name="slot[]" value="9:00AM" @if(isset($slots)){{$slots->contains('slot','9:00AM')?'checked':''}}@endif>9:00AM</td>
                <td><input type="checkbox" name="slot[]" value="9:20AM" @if(isset($slots)){{$slots->contains('slot','9:20AM')?'checked':''}}@endif>9:20AM</td>
                <td><input type="checkbox" name="slot[]" value="9:40AM" @if(isset($slots)){{$slots->contains('slot','9:40AM')?'checked':''}}@endif>9:40AM</td>
                </tr>
                <tr>
                <td scope="row">2</td>
                <td><input type="checkbox" name="slot[]" value="10:00AM" @if(isset($slots)){{$slots->contains('slot','10:00AM')?'checked':''}}@endif>10:00AM</td>
                <td><input type="checkbox" name="slot[]" value="10:20AM" @if(isset($slots)){{$slots->contains('slot','10:20AM')?'checked':''}}@endif>10:20AM</td>
                <td><input type="checkbox" name="slot[]" value="10:40AM" @if(isset($slots)){{$slots->contains('slot','10:40AM')?'checked':''}}@endif>10:40AM</td>
                </tr>
                <tr>
                <td scope="row">3</td>
                <td><input type="checkbox" name="slot[]" value="11:00AM" @if(isset($slots)){{$slots->contains('slot','11:00AM')?'checked':''}}@endif>11:00AM</td>
                <td><input type="checkbox" name="slot[]" value="11:20AM" @if(isset($slots)){{$slots->contains('slot','11:20AM')?'checked':''}}@endif>11:20AM</td>
                <td><input type="checkbox" name="slot[]" value="11:40AM" @if(isset($slots)){{$slots->contains('slot','11:40AM')?'checked':''}}@endif>11:40AM</td>
                </tr>
                
            </tbody>
        </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Choose PM Time Slot
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                <td scope="row">1</td>
                <td><input type="checkbox" name="slot[]" value="12:00PM" @if(isset($slots)){{$slots->contains('slot','12:00PM')?'checked':''}}@endif>12:00PM</td>
                <td><input type="checkbox" name="slot[]" value="12:20PM" @if(isset($slots)){{$slots->contains('slot','12:20PM')?'checked':''}}@endif>12:20PM</td>
                <td><input type="checkbox" name="slot[]" value="12:40PM" @if(isset($slots)){{$slots->contains('slot','12:40PM')?'checked':''}}@endif>12:40PM</td>
                </tr>
                <tr>
                <td scope="row">2</td>
                <td><input type="checkbox" name="slot[]" value="2:00PM" @if(isset($slots)){{$slots->contains('slot','2:00PM')?'checked':''}}@endif>2:00PM</td>
                <td><input type="checkbox" name="slot[]" value="2:20PM" @if(isset($slots)){{$slots->contains('slot','2:20PM')?'checked':''}}@endif>2:20PM</td>
                <td><input type="checkbox" name="slot[]" value="2:40PM" @if(isset($slots)){{$slots->contains('slot','2:40PM')?'checked':''}}@endif>2:40PM</td>
                </tr>
                <tr>
                <td scope="row">3</td>
                <td><input type="checkbox" name="slot[]" value="3:00PM" @if(isset($slots)){{$slots->contains('slot','3:00PM')?'checked':''}}@endif>3:00PM</td>
                <td><input type="checkbox" name="slot[]" value="3:20PM" @if(isset($slots)){{$slots->contains('slot','3:20PM')?'checked':''}}@endif>3:20PM</td>
                <td><input type="checkbox" name="slot[]" value="3:40PM" @if(isset($slots)){{$slots->contains('slot','3:40PM')?'checked':''}}@endif>3:40PM</td>
                </tr>
                <tr>
                <td scope="row">4</td>
                <td><input type="checkbox" name="slot[]" value="4:00PM" @if(isset($slots)){{$slots->contains('slot','4:00PM')?'checked':''}}@endif>4:00PM</td>
                <td><input type="checkbox" name="slot[]" value="4:20PM" @if(isset($slots)){{$slots->contains('slot','4:20PM')?'checked':''}}@endif>4:20PM</td>
                <td><input type="checkbox" name="slot[]" value="4:40PM" @if(isset($slots)){{$slots->contains('slot','4:40PM')?'checked':''}}@endif>4:40PM</td>
                </tr>
                <tr>
                <td scope="row">5</td>
                <td><input type="checkbox" name="slot[]" value="5:00PM" @if(isset($slots)){{$slots->contains('slot','5:00PM')?'checked':''}}@endif>5:00PM</td>
                <td><input type="checkbox" name="slot[]" value="5:20PM" @if(isset($slots)){{$slots->contains('slot','5:20PM')?'checked':''}}@endif>5:20PM</td>
                <td><input type="checkbox" name="slot[]" value="5:40PM" @if(isset($slots)){{$slots->contains('slot','5:40PM')?'checked':''}}@endif>5:40PM</td>
                </tr>
                <tr>
                <td scope="row">6</td>
                <td><input type="checkbox" name="slot[]" value="6:00PM" @if(isset($slots)){{$slots->contains('slot','6:00PM')?'checked':''}}@endif>6:00PM</td>
                <td><input type="checkbox" name="slot[]" value="6:20PM" @if(isset($slots)){{$slots->contains('slot','6:20PM')?'checked':''}}@endif>6:20PM</td>
                <td><input type="checkbox" name="slot[]" value="6:40PM" @if(isset($slots)){{$slots->contains('slot','6:40PM')?'checked':''}}@endif>6:40PM</td>
                </tr>
                <tr>
                <td scope="row">7</td>
                <td><input type="checkbox" name="slot[]" value="8:00PM" @if(isset($slots)){{$slots->contains('slot','8:00PM')?'checked':''}}@endif>8:00PM</td>
                <td><input type="checkbox" name="slot[]" value="8:20PM" @if(isset($slots)){{$slots->contains('slot','8:20PM')?'checked':''}}@endif>8:20PM</td>
                <td><input type="checkbox" name="slot[]" value="8:40PM" @if(isset($slots)){{$slots->contains('slot','8:40PM')?'checked':''}}@endif>8:40PM</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</div>
</form>

@else
<div class="card">
        <div class="card-header">
        <h4>List of Appointment Slot : {{$myappointments->count()}}</h4>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Creator</th>
            <th scope="col">Date</th>
            <th scope="col">View/Update</th>
            </tr>
        </thead>
        <tbody>

            @foreach($myappointments as $appointment)
                <tr>
                    <td>{{$appointment->dentist->name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>
                        <form action="{{route('appointment.check')}}" method="post">@csrf
                            <input type="hidden" name="date" value="{{$appointment->date}}">
                            <button type="submit" class="btn btn-primary">View/Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endif

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.5;
    }
    body{
        font-size:15px;
    }
</style>

@endsection    