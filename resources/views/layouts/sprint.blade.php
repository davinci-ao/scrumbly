<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <h3>{{$sprint->name}}</h3>
        <form action="{{route('finishSprint')}}">
            <button class="btn btn-primary" type="submit" name="sprintId" value='{{$sprint->id}}'>Finish</button>    
        </form>
    </div>
</div>