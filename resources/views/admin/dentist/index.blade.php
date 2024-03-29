@extends('admin.layouts.master')

@section('content')
<div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                    @if(Session::has('message'))
                                            <div class="alert alert-success">
                                                {{Session::get('message')}}
                                            </div>
                                @endif
                                        <i class="ik ik-inbox bg-blue"></i>
                                       
                                        <div class="d-inline">
                                            <h5>User</h5>
                                            <span>List of Users</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Dentist</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">List</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>KPS Dentist List</h3></div>
                                    <div class="card-body">
                                        <table id="data_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="nosort">Avatar</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Phone Number</th>
                                                    <th class="nosort">&nbsp;</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($users)>0)
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->address}}</td>
                                                    <td>{{$user->phone_number}}</td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}"><i class="ik ik-eye"></i></a>
                                                            <a href="{{route('dentist.edit',[$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                                            <a href="{{route('dentist.show',[$user->id])}}"><i class="ik ik-trash-2"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- View Modal -->
                                                @include('admin.dentist.modal')
                                             @endforeach 
                                             @else
                                             <td>No User</td>
                                             @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection