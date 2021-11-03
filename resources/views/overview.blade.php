<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Is gonna become a popup -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
                @include("layouts.sprint-form")
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
