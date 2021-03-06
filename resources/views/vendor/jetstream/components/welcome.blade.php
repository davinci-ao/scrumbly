@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welkom op Scrumbly
    </div>

    <div class="mt-6 text-gray-500">
        Hier kunt u al de projecten zien waar u aan meedoet.
    </div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    @foreach($projects as $project)
        <div class="p-6 border border-gray-200 md:border-t-0 md:border-l">
            <div class="flex items-center">
                <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> -->
                <div class="text-decoration-none ml-8 text-2xl text-gray-700 leading-7 font-semibold">{{ $project->name }}</div>
            </div>

            <div class="ml-8">
                <div class="mt-2 text-sm text-gray-500">
                {{ $project->description }}
                </div>

                <a href="{{ route('projectIndex', [$project->slug]) }}">
                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Ga naar dit project</div>
                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </a>
            </div>
        </div> 
    @endforeach
</div>
