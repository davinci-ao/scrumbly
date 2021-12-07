<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserLabel">Edit User </h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('editUser', [$user->id]) }}">
        @csrf
          <div class="form-group">
            <label for="user-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            <label for="user-email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>