<div class="page-wrap">
                <div class="app-sidebar colored" style="background-color: #023020 !important;">
                    <div class="sidebar-header" style="background-color: #023020 !important;">
                        <a class="header-brand" href="{{url('dashboard')}}">
                        <div class="logo-img">
                            <img src="{{ asset('banner/logo.png') }}" alt="Logo" style="width: 30px; height: auto;">
                        </div>
                            <span class="text">KPS</span>
                        </a>
                        
                    </div>
                    
                    <div class="sidebar-content" style="background-color: #577d5d !important;">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main" style="background-color: #577d5d !important;">
                                <div class="nav-lavel" style="background-color: #2e5a4a !important;">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                              
                                @if(auth()->check()&& auth()->user()->roles->name === 'admin')
                                <div class="nav-item has-sub" style="background-color: #577d5d !important;">
                                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>User</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content" style="background-color: #577d5d !important;">
                                        <a href="{{route('dentist.create')}}" class="menu-item">Create New User</a>
                                        <a href="{{route('dentist.index')}}" class="menu-item">View User List</a>
                                    </div>
                                </div>
                                @endif

                                @if(auth()->check()&& auth()->user()->roles->name === 'dentist')
                                <div class="nav-item has-sub" style="background-color: #577d5d !important;">
                                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Appointment Slot</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content" style="background-color: #577d5d !important;">
                                        <a href="{{route('appointment.create')}}" class="menu-item">Create New Slot</a>
                                        <a href="{{route('appointment.index')}}" class="menu-item">Check & Update Slot</a>
                                    </div>
                                </div>
                                @endif

                                @if(auth()->check()&& auth()->user()->roles->name === 'dentist')
                                <div class="nav-item has-sub" style="background-color: #577d5d !important;">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content" style="background-color: #577d5d !important;">
                                        <a href="{{route('today.patients')}}" class="menu-item">Today Patients</a>
                                        <a href="{{route('treatment.list')}}" class="menu-item">All Patients Treatment</a>
                                    </div>
                                </div>
                                @endif


                                @if(auth()->check()&& auth()->user()->roles->name === 'admin')
                                <div class="nav-item has-sub" style="background-color: #577d5d !important;">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointment List</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content" style="background-color: #577d5d !important;">
                                        <a href="{{route('patient')}}" class="menu-item">Today Appointments</a>
                                        <a href="{{route('all.appointments')}}" class="menu-item">All Appointments</a>
                                    </div>
                                </div>
                                @endif

                                <div class="nav-item active">
                                    <a  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Log Out</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                    
                            </nav>
                        </div>
                    </div>
                </div>