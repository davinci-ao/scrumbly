<!-- <form class="row m-2 border" action="{{route('addSprint')}}">
    <h3 class="m-2">Add a new sprint</h3>
        <div class="col-6 d-flex justify-content-end align-items-center">
        <label><b>Name :</b></label>
            <input type="text" class="p-2 ml-2 border rounded mr-auto" style="margin-right: auto" name="name" required>
            <div class="col-6"></div>
        </div>
    <br>
        <div class="col-12">
            <button type="submit" class="my-3 btn btn-success">Submit</button>
        </div>
</form> -->

<div class="modal fade" id="addNewSprint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Sprint </h5>
      </div>
      <div class="modal-body">
        <form action="{{route('addSprint')}} method='post'>
        @csrf
          <div class="form-group">
            <label for="playlist-name" class="col-form-label">Sprint name:</label>
            <input type="text" class="form-control" id="playlist-name" name="playlistName">
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