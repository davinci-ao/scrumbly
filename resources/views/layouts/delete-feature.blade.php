<div class="modal fade" id="deleteFeature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Weetje zeker dat je deze Feature wilt verwijderen?</h5>
      </div>
      <div class="modal-body">
        <!-- action=" route('deleteFeature', [$feature_id]) " -->
      <form method='post'>
        @csrf
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success mr-2">Ja</button>
            <button type="submit" class="btn btn-danger ml-2" data-dismiss="modal">Nee</button>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>