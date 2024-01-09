<script src="{{ asset('js/app.js') }}" defer></script>

<div class="main-content" id="app">
    <div class="container-fluid">
        <div class="row clearfix">
            @if(auth()->check() && auth()->user()->roles->name === 'admin')
                <!-- Admin Dashboard Widgets -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Number of Patients</h6>
                                    <h2>{{ App\Models\User::where('user_type', 3)->count() }}</h2>
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
                                    <h2>{{ App\Models\User::where('user_type', 1)->count() }}</h2>
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
                                    <h6>Number of Admins</h6>
                                    <h2>{{ App\Models\User::where('user_type', 2)->count() }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-users"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block"></small>
                        </div>
                    </div>
                </div>
                <!-- Chart Section -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>User Gender Overview</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="userGendersChart" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>

              <!-- Script for Chart -->
              <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    var gendersData = {!! json_encode(App\Models\User::select('gender', \DB::raw('COUNT(id) as user_count'))
                        ->groupBy('gender')
                        ->pluck('user_count', 'gender')
                        ->toArray()) !!};

                    console.log('Raw Genders Data:', {!! json_encode(App\Models\User::select('gender', \DB::raw('COUNT(id) as user_count'))->groupBy('gender')->get()) !!});
                    console.log('Genders Data:', gendersData);

                    var ctx = document.getElementById('userGendersChart').getContext('2d');
                    var userGendersChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: Object.keys(gendersData),
                            datasets: [{
                                data: Object.values(gendersData),
                                backgroundColor: ['#FF6384', '#36A2EB'], // You may adjust colors as needed
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        },
                    });
                });
            </script>
            @elseif(auth()->check() && auth()->user()->roles->name === 'dentist')
                <!-- Dentist Dashboard Widgets -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Today's Appointments</h6>
                                <h2>{{ App\Models\Booking::where('dentist_id', auth()->user()->id)->count() }}
                                </h2>
                            </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block"></small>
                        </div>
                    </div>
                </div>
                <!-- Add more widgets for the dentist role -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total of Treatments</h6>
                                <h2>{{ App\Models\Treatment::where('dentist_id', auth()->user()->id)->count() }}</h2>
                            </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block"></small>
                        </div>
                    </div>
                </div>
                

            @endif
        </div>
    </div>
</div>
