<div class="modal fade" id="editMember{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserLabel">Edit {{ $member->name }} </h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('editMember', ['member_id' => $member->id, 'slug' => $project->slug]) }}">
        @csrf
          <div class="form-group">
            <select name="role" class="form-control" id="exampleFormControlSelect1">
              @foreach($allRoles as $scrumRole)
                @if ($member->role_id == $scrumRole->id)
                  <option selected>{{ $member->role }}</option>
                @else
                  <option>{{ $scrumRole->name  }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>