<div class="modal fade" id="addNewFeature{{ $panel }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Feature </h5>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('createFeature', [$project->slug])}}">
        @csrf
          <div class="form-group">
            <label for="feature-name" class="col-form-label">Feature name:</label>
            <input type="text" class="form-control" id="name" name="name" minlength="4" maxlength="64" required>
            <label for="feature-description" class="col-form-label">Feature description:</label>
            <input type="description" class="form-control" id="description" name="description" maxlength="999" required>
            <label for="feature-name" class="col-form-label">Storypoint(s):</label>
            <input type="hidden" id="panel_id" name="panel_id" value="{{ $panel->id }}">
            <input type="hidden" id="project_id" name="project_id" value="{{ $project_id }}">
            <div class="col-2">
                <input type="number" class="form-control" id="storypoint" name="storypoint" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Feature</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>