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
                    
                    <th scope="col">Treatment Date</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Dentist Name</th>
                    <th scope="col">Treatment Name</th>
                    <th scope="col">Treatment Description</th>
                    <th scope="col">Treatment Prescription (If any) </th>
                    </tr>
                </thead>
                @forelse($treatments as $treatment)
                <tbody>
                    <tr>
                    
                    <td>{{$treatment->date}}</td>
                    <td>{{$treatment->user->name}}</td>
                    <td>{{$treatment->dentist->name}}</td>
                    <td>{{$treatment->name_of_treatment}}</td>
                    <td>{{$treatment->treatment_description}}</td>
                    <td>{{$treatment->prescription}}</td>
                    </tr>
                    <tr>
                        @empty
                    <td>You have no treatment yet!</td>
                    @endforelse
                    
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
