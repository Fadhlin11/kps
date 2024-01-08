<script src="{{ asset('js/app.js') }}"defer></script>

<div class="main-content" id="app">
<!--     <appc></appc> -->
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Number of Patients</h6>
                                                <h2>{{App\Models\User::where('user_type',3)->count()}}</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block"></small>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Number of Dentists</h6>
                                                <h2>{{App\Models\User::where('user_type',1)->count()}}</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block"></small>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Roles</h6>
                                                <h2>{{App\Models\Role::count()}}</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-user-check"></i>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Number of Appointments</h6>
                                                <h2>{{App\Models\Booking::count()}}</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                               <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Treatment</h6>
                                                <h2>{{App\Models\Treatment::count()}}</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-align-justify"></i>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                       


                        </div>
                        
                    </div>
                </div>