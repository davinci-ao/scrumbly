<div class="modal fade" id="addNewProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ProjectLabel">Create new Project</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('createProject')}}">
        @csrf
          <div class="form-group">
            <label for="project-name" class="col-form-label">Project name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <label for="project-discription" class="col-form-label">Project discription:</label>
            <input type="textarea" class="form-control" id="discription" name="discription" required>
            <label for="project-slug" class="col-form-label">Project slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create Project</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>