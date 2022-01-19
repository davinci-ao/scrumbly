<div class="modal fade" id="editProject{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProjectLabel">Edit Project </h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('editProject', [$project->id]) }}">
        @csrf
          <div class="form-group">
            <label for="project-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
            <label for="project-description" class="col-form-label">description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $project->description }}">
            <label for="project-slug" class="col-form-label">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $project->slug }}" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Project</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>