@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>TREATMENT DETAILS</strong>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Treatment Date:</strong> {{$treatment->date}}
                        </div>
                        <div class="mb-3">
                            <strong>Patient Name:</strong> {{$treatment->user->name}}
                        </div>
                        <div class="mb-3">
                            <strong>Dentist Name:</strong> {{$treatment->dentist->name}}
                        </div>
                        <div class="mb-3">
                            <strong>Treatment Name:</strong> {{$treatment->name_of_treatment}}
                        </div>
                        <div class="mb-3">
                            <strong>Treatment Description:</strong> {{$treatment->treatment_description}}
                        </div>
                        <div class="mb-3">
                            <strong>Treatment Prescription (If any):</strong> {{$treatment->prescriptions}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
