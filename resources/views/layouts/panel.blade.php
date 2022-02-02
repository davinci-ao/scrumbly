<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <x-nav-link href="{{ route('panelIndex', [$panel->id]) }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{$panel->name}}
        </x-nav-link>
        <form method="post" action="{{ route('finishPanel', [$panel->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" id="project_slug" name="project_slug" value="{{ $project->slug }}">
            <button class="btn btn-primary" type="submit">Finish</button>    
            @if(!$panel->active)
                finished
            @endif
        </form>
    </div>
</div>