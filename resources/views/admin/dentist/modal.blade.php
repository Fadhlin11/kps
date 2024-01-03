<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dentist Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center"> 
            <img src="{{asset('images')}}/{{$user->image}}" width="200" class="mx-auto">
        </p>
            <p class = "badge badge-pill badge-dark">User Type : {{$user->roles->name}}</p>
            <p>Name : {{$user->name}}</p>
            <p>Email : {{$user->email}}</p>
            <p>Address : {{$user->address}}</p>
            <p>Phone Number : {{$user->phone_number}}</p>
            <p>Position : {{$user->position}}</p>
            <p>Education : {{$user->education}}</p>
            <p>Description : {{$user->description_dentist}}</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>