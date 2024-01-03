@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
                <strong>TREATMENT DETAILS</strong>
              </div>

                <div class="card-body">
                    <p>Treatment Date : {{$treatment->date}}</p>
                    <p>Patient Name : {{$treatment->user->name}}</p>
                    <p>Dentist Name :{{$treatment->dentist->name}}</p>
                    <p>Treatment Name : {{$treatment->name_of_treatment}}</p>
                    <p>Treatment Description : {{$treatment->treatment_description}}</p>
                    <p>Treatment Prescription (If any) : {{$treatment->prescription}}</p>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
