@extends('layouts.app')

@section('content')
<div class="container mx-auto"> <!-- Use mx-auto to center the container -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">UPDATE PROFILE</div>

                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                        </div>

                        <br>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ auth()->user()->phone_number }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select gender</option>
                                <option value="male" @if(auth()->user()->gender==='male') selected @endif >Male</option>
                                <option value="female" @if(auth()->user()->gender==='female') selected @endif>Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group text-center"> <!-- Center the button -->
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
