<form class="row m-2 border" action="{{route('addSprint')}}">
    <h3 class="m-2">Add a new sprint</h3>
        <div class="col-6 d-flex justify-content-end align-items-center">
        <label><b>Name :</b></label>
            <input type="text" class="p-2 ml-2 border rounded mr-auto" style="margin-right: auto" name="name" required>
            <div class="col-6"></div>
        </div>
    <br>
        <div class="col-12">
            <button type="submit" class="my-3 btn btn-success">Submit</button>
        </div>
</form>
