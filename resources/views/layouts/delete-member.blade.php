<div class="modal fade" id="deleteMember{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteMember">Weet je zeker dat je {{ $member->name }} uit het project wilt verwijderen?</h5>
      </div>
      <div class="modal-body">
      <form method='get' action="{{ route('deleteMember', ['member_id' => $member->id, 'slug' => $project->slug] ) }}">
        @csrf
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mr-2">Ja</button>
            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Nee</button>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>
