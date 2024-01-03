@extends('admin.layouts.master')

@section('content')
<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                          <h5>Dentist</h5>
                                            <span>Set Appointment Slot</span>
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
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <form action="{{route('appointment.store')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            Choose Date
        </div>
        <div class="card-body">
            <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        </div>
    </div>
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
                <tr>
                <td scope="row">1</td>
                <td><input type="checkbox" name="slot[]" value="9:00AM">9:00AM</td>
                <td><input type="checkbox" name="slot[]" value="9:20AM">9:20AM</td>
                <td><input type="checkbox" name="slot[]" value="9:40AM">9:40AM</td>
                </tr>
                <tr>
                <td scope="row">2</td>
                <td><input type="checkbox" name="slot[]" value="10:00AM">10:00AM</td>
                <td><input type="checkbox" name="slot[]" value="10:20AM">10:20AM</td>
                <td><input type="checkbox" name="slot[]" value="10:40AM">10:40AM</td>
                </tr>
                <tr>
                <td scope="row">3</td>
                <td><input type="checkbox" name="slot[]" value="11:00AM">11:00AM</td>
                <td><input type="checkbox" name="slot[]" value="11:20AM">11:20AM</td>
                <td><input type="checkbox" name="slot[]" value="11:40AM">11:40AM</td>
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
                <td><input type="checkbox" name="slot[]" value="12:00PM">12:00PM</td>
                <td><input type="checkbox" name="slot[]" value="12:20PM">12:20PM</td>
                <td><input type="checkbox" name="slot[]" value="12:40PM">12:40PM</td>
                </tr>
                <tr>
                <td scope="row">2</td>
                <td><input type="checkbox" name="slot[]" value="2:00PM">2:00PM</td>
                <td><input type="checkbox" name="slot[]" value="2:20PM">2:20PM</td>
                <td><input type="checkbox" name="slot[]" value="2:40PM">2:40PM</td>
                </tr>
                <tr>
                <td scope="row">3</td>
                <td><input type="checkbox" name="slot[]" value="3:00PM">3:00PM</td>
                <td><input type="checkbox" name="slot[]" value="3:20PM">3:20PM</td>
                <td><input type="checkbox" name="slot[]" value="3:40PM">3:40PM</td>
                </tr>
                <tr>
                <td scope="row">4</td>
                <td><input type="checkbox" name="slot[]" value="4:00PM">4:00PM</td>
                <td><input type="checkbox" name="slot[]" value="4:20PM">4:20PM</td>
                <td><input type="checkbox" name="slot[]" value="4:40PM">4:40PM</td>
                </tr>
                <tr>
                <td scope="row">5</td>
                <td><input type="checkbox" name="slot[]" value="5:00PM">5:00PM</td>
                <td><input type="checkbox" name="slot[]" value="5:20PM">5:20PM</td>
                <td><input type="checkbox" name="slot[]" value="5:40PM">5:40PM</td>
                </tr>
                <tr>
                <td scope="row">6</td>
                <td><input type="checkbox" name="slot[]" value="6:00PM">6:00PM</td>
                <td><input type="checkbox" name="slot[]" value="6:20PM">6:20PM</td>
                <td><input type="checkbox" name="slot[]" value="6:40PM">6:40PM</td>
                </tr>
                <tr>
                <td scope="row">7</td>
                <td><input type="checkbox" name="slot[]" value="8:00PM">8:00PM</td>
                <td><input type="checkbox" name="slot[]" value="8:20PM">8:20PM</td>
                <td><input type="checkbox" name="slot[]" value="8:40PM">8:40PM</td>
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

        </form>

</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.5;
    }
    body{
        font-size:15px;
    }
</style>

@endsection    