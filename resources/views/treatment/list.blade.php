@extends('admin.layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
               
                <div class="card-header">Booking Appointment : ({{$patients->count()}})</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Dentist</th>
                          
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$patient->date}}</td>
                          <td>{{$patient->user->name}}</td>
                          <td>{{$patient->user->email}}</td>
                          <td>{{$patient->user->phone_number}}</td>
                          <td>{{$patient->dentist->name}}</td>
                          
                          <td>
                            <!-- Button trigger modal -->
                           
                            <a href="{{route('treatment.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View Treatment</a>
                            
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
