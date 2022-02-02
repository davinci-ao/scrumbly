<div class="modal fade" id="editPanel{{ $panel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Panel</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('editPanel', ['slug' => $project->slug, 'panel_id' => $panel->id])}}">
        @csrf
          <div class="form-group">
            <label for="playlist-name" class="col-form-label">Panel name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $panel->name }}" minlength="4" maxlength="64" required>
            <input type="hidden" id="project_slug" name="project_slug" value="{{ $project->slug }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Panel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>