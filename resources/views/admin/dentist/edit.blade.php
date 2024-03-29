@extends('admin.layouts.master')

@section('content')
<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                          <h5>Dentist</h5>
                                            <span>Edit Dentist</span>
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
                                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row-justify-content-center">
                            <div class="col-lg-10">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <div class="card-header"><h3>EDIT DENTIST</h3></div>
                                <div class="card-body">
                                    <form class="forms-sample" action="{{route('dentist.update',[$users->id])}}" method="post" enctype="multipart/form-data">@csrf
                                    @method('PUT')
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Full Name</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Dentist Name" value="{{$users->name}}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Dentist Email" value="{{$users->email}}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Dentist Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Gender</label>
                                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                    @foreach(['male','female'] as $gender)
                                                    <option value="{{$gender}}" @if($users->gender==$gender)selected @endif>
                                                        {{$gender}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Phone Number</label>
                                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Dentist Phone Number" value="{{$users->phone_number}}">
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Dentist Address" value="{{$users->address}}">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Position</label>
                                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Dentist Position" value="{{$users->position}}">
                                                @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Education</label>
                                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Dentist Education" value="{{$users->education}}">
                                                @error('education')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>Image of Dentist</label>
                                                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Upload Image" name="image">
                                                        <span class="input-group-append">
                                                        </span>
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                         @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>User Type</label>
                                                    <select name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                                                        <option value="">Please Select User Type</option>
                                                        @foreach(App\Models\Role::where('name','!=','patient')->get() as $role)
                                                        <option value="{{$role->id}}" @if($users->user_type==$role->id)selected @endif>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror
                                                </div>
                                            </div>
                                        
                                        <div class="form-group">
                                                <label for="exampleTextarea1">Description</label>
                                                <textarea class="form-control @error('description_dentist') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description_dentist">{{$users->description_dentist}}</textarea>
                                                @error('description_dentist')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>


@endsection