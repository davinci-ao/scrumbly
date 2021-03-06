@include("layouts.create-feature")
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $panel->name }} 
        </p>

        <x-nav-link data-toggle="modal" data-target="#addNewFeature{{ $panel }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Add a new Feature') }}
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
                <h3 class="m-3">User stories</h3>
                @foreach($features as $feature)
                    @include('layouts.feature', ['feature' => $feature])
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>