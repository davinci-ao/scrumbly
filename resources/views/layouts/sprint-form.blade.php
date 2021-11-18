<div class="modal fade" id="addNewSprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Sprint </h5>
      </div>
      <div class="modal-body">
        <form action="{{route('addSprint')}}">
        @csrf
          <div class="form-group">
            <label for="playlist-name" class="col-form-label">Sprint name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Sprint</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>