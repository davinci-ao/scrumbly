<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('projects') }}
        </h2>
    </x-slot>
    @include('layouts.delete-feature')

    <a data-toggle="modal" data-target="#exampleModal" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
        {{ __('Delete Feature') }}
    </a>

    @include("layouts.sprint-form")

    <a data-toggle="modal" data-target="#addNewSprint" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
        {{ __('Add a new Sprint') }}
    </a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Is gonna become a popup -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
            <!-- ****** -->
            <h3 class="m-3">Sprints</h3>
            @if($sprintData != null)
                @foreach($sprintData as $sprint)
                    @include('layouts.sprint', ['sprint' => $sprint])
                @endforeach
            @endif
            </div>
        </div> 
    </div>
</x-app-layout>
