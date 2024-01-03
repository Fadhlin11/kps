@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Dentist</h5>
                    <span>Create New Dentist</span>
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
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header"><h3>DELETE CONFIRMATION</h3></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success card">
                        {{Session::get('message')}}
                    </div>
                @endif
                <img src="{{asset('images')}}/{{$users->image}}" width="120">
                <h2>{{$users->name}}</h2>
                <form class="forms-sample" action="{{route('dentist.destroy',[$users->id])}}" method="post">@csrf
                    @method('DELETE')
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                        <a href="{{route('dentist.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
