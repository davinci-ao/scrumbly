@include('layouts.create-project')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
        <x-nav-link data-toggle="modal" data-target="#addNewProject" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Create a new Project') }}
        </x-nav-link>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome :projects="$projects" />
            </div>
        </div>
    </div>
</x-app-layout>
