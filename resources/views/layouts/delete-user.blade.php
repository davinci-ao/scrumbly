<div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserLabel">Weet je zeker dat je {{ $user->name }} wilt verwijderen?</h5>
      </div>
      <div class="modal-body">
      <form method='get' action="{{ route('deleteUser', [$user->id] ) }}">
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
