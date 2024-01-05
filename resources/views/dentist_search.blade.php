<!-- _dentist_search.blade.php -->
<!-- Search Dentist Form -->
<form action="{{ url('/') }}" method="GET" class="mb-3">
    <div class="card">
        <div class="card-header">Search Date to Book Appointment</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="datepicker" name="date">
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Dentists Table -->
<div class="card">
    <div class="card-header">Dentist Available on Today</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dentists as $dentist)
                                <tr>
                                    <td>1</td>
                                    <td><img src="{{asset('images')}}/{{$dentist->dentist->image}}" width="50" height="50" style="border-radius: 50%;"></td>
                                    <td>{{$dentist->dentist->name}}</td>
                                    <td>
                                        <a href="{{route('create.appointment',[$dentist->user_id,$dentist->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Dentist Available on This Date</td>
                                </tr>
                            @endforelse
                        </tbody>
                
            </table>
        </div>
    </div>
</div>
