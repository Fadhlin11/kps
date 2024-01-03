@extends('admin.layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Booking Appointment : ({{$bookings->count()}})</div>
                
                <form action="{{route('patient')}}" method="GET">
                <div class="card-header">
                  Enter Date :&nbsp; 
                  <div class="row">
                  <div class="col-md-10">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                  </div>
                </div>
                </form>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Time</th>
                          <th scope="col">Dentist</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->slot}}</td>
                          <td>{{$booking->dentist->name}}</td>
                          <td>
                              @if($booking->status==0)
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-primary">Pending</button></a>
                              @else 
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">Visited</button></a>
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>There is no appointment for today!</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
