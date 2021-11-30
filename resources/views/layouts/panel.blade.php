<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <h3>{{$panel->name}}</h3>
        <form action="{{route('finishPanel')}}">
            <input type="hidden" name="panel_id" value='{{ $panel->id }}'>
            <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}">
            <button class="btn btn-primary" type="submit">Finish</button>    
            @if($panel->status_id == 1)
                finished
            @endif
        </form>

        @include("layouts.delete-panel")
        <x-nav-link data-toggle="modal" data-target="#deletePanel{{ $panel->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Delete panel') }}
        </x-nav-link>
    </div>
</div>