@if(count($bookings)>0)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{route('treatment')}}" method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Treatment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
        <input type="hidden" name="dentist_id" value="{{$booking->dentist_id}}">
        <input type="hidden" name="date" value="{{$booking->date}}">

        <div class="form-group">
            <label>Treatment</label>
            <input type="text" name="name_of_treatment" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Treatment Description</label>
            <input type="text" name="treatment_description" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Prescription (If any)</label>
            <input type="text" name="prescriptions" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endif