@include("layouts.create-panel")

<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->name }} 
        </p>

        <x-nav-link data-toggle="modal" data-target="#addNewFeature" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Add a new Feature') }}
        </x-nav-link>

        <x-nav-link data-toggle="modal" data-target="#addNewPanel" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Add a new Panel') }}
        </x-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
            <h3 class="m-3">Panels</h3>
            @if($panels != null)
                @foreach($panels as $panel)
                    @include('layouts.panel', ['panel' => $panel])
                @endforeach
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
