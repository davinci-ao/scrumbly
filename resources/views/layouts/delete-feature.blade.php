<div class="modal fade" id="deleteFeature{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFeatureLabel">Weet je zeker dat je {{ $feature->name }} wilt verwijderen?</h5>
      </div>
      <div class="modal-body">
        <form method='post' action="{{ route('deleteFeature', ['slug' => $project->slug, 'feature_id' => $feature->id] ) }}">
        @csrf
          <div class="d-flex justify-content-center">
            <input type="hidden" id="panel_id" name="panel_id" value="{{ $panel->id }}">
            <input type="hidden" id="project_id" name="project_id" value="{{ $project_id }}">
            <button type="submit" class="btn btn-success mr-2">Ja</button>
            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Nee</button>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>
