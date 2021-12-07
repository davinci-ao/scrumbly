<div class="modal fade" id="editFeature{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFeatureLabel">Edit Feature </h5>
      </div>
      <div class="modal-body">
        <form action="{{route('editFeature', [$feature->id])}}">
        @csrf
          <div class="form-group">
            <label for="feature-name" class="col-form-label">Feature name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}" required>
            <label for="feature-description" class="col-form-label">Feature description:</label>
            <input type="description" class="form-control" id="description" name="description" value="{{ $feature->description }}" required>
            <label for="feature-name" class="col-form-label">Storypoint(s):</label>
            <div class="col-2">
                <input type="number" class="form-control" id="storypoint" name="storypoints" value="{{ $feature->storypoints }}" required>
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