@extends('layouts.app')

@section('content')
<br>
<div class="container">
<body style="background: url('{{ asset('banner/background.png') }}') no-repeat center center fixed; background-size: cover; overflow: auto;">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Treatments') }}</div>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Treatment Date</th>
                    <th scope="col">Dentist Name</th>
                    <th scope="col">Treatment Name</th>
                    <th scope="col">Treatment Description</th>
                    <th scope="col">Treatment Prescription (If Any) </th>
                    </tr>  
                </thead>
                @forelse($treatments as $key=>$treatment)
                <tbody>
                    <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$treatment->date}}</td>
                    <td>{{$treatment->dentist->name}}</td>
                    <td>{{$treatment->name_of_treatment}}</td>
                    <td>{{$treatment->treatment_description}}</td>
                    <td>{{$treatment->prescriptions}}</td>
                    </tr>
                    <tr>
                        @empty
                    <td>Sorry, you have no treatment yet!</td>
                    @endforelse
                    
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
