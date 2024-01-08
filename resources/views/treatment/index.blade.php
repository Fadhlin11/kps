@extends('admin.layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                <br>
                <div class="card-header">Booking Appointment : ({{$bookings->count()}})</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Time</th>
                          <th scope="col">Dentist</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
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
                            @if($booking->status==1)
                              Visited
                            @endif
                          </td>
                          <td>
                            <!-- Button trigger modal -->
                            @if(!App\Models\Treatment::where('date',date('d-m-Y'))->where('dentist_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                               Treatment
                            </button>
                            @include('treatment.form')
                            @else
                            <a href="{{route('treatment.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary">View Treatment</a>
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
