<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <h3>{{$sprint->name}}</h3>
        <form action="{{route('finishSprint')}}">
            <input type="hidden" name="sprint_id" value='{{$sprint->id}}'>
            <button class="btn btn-primary" type="submit">Finish</button>    
            @if($sprint->status_id == 1)
            finished
            @endif
        </form>
    </div>
</div>
