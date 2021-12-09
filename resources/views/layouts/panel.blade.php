@include("layouts.edit-panel")
@include("layouts.delete-panel")
<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <h3>{{$panel->name}}</h3>
        <form method="post" action="{{ route('finishPanel', [$panel->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}">
            <button class="btn btn-primary" type="submit">Finish</button>    
            @if($panel->active == false)
                finished
            @endif
        </form>

        <x-nav-link data-toggle="modal" data-target="#deletePanel{{ $panel->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Delete panel') }}
        </x-nav-link>

        <x-nav-link data-toggle="modal" data-target="#editPanel{{ $panel->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Edit panel') }}
        </x-nav-link>
    </div>
</div>