<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('projects') }}
        </h2>
    </x-slot>
    @include("layouts.sprint-form")

    <a data-toggle="modal" data-target="#addNewFeature" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
        {{ __('Add a new Feature') }}
    </a>

    @include('layouts.feature-form')

    <a data-toggle="modal" data-target="#addNewSprint" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
        {{ __('Add a new Sprint') }}
    </a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
            <h3 class="m-3">Sprints</h3>
            @if($sprints != null)
                @foreach($sprints as $sprint)
                    @include('layouts.sprint', ['sprint' => $sprint])
                @endforeach
            @endif
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
            <h3 class="m-3">User stories</h3>
            @if($features != null)
                @foreach($features as $feature)
                    @include('layouts.feature', ['feature' => $feature])
                @endforeach
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
