@include("layouts.create-panel")
@include("layouts.edit-project")

<x-app-layout>
    <x-slot name="header">
    <x-nav-link data-toggle="modal" data-target="#editProject{{ $project->id }}" class="text-decoration-none font-semibold ml-auto hover:text-gray-600 text-xl text-gray-800 leading-tight d-block">
            {{ $project->name }} 
        </x-nav-link>

        <x-nav-link data-toggle="modal" data-target="#addNewPanel" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Add a new Panel') }}
        </x-nav-link>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg row">
                <h3 class="m-3">Panels</h3>
                @foreach($panels as $panel)
                    @include('layouts.panel', ['panel' => $panel])
                @endforeach
            </div>
        </div>
    </div>

    <div class="row m-2 bg-white shadow-xl rounded col-12 col-md-6 col-lg-4">
        @foreach($allRoles as $scrumRole)
            <h3 class="m-3">{{ $scrumRole->name }}</h3>
            @foreach($members as $member)
            @include("layouts.edit-member")
            @include("layouts.delete-member")
                @if($member->role_id == $scrumRole->id)
                    <div class="row m-2 bg-black text-white shadow-xl rounded col-12 col-md-6 col-lg-4">
                        <p>{{ $member->name }}</p>
                        @if($role == 1)
                            @if($scrumRole->id != 1)
                                <x-nav-link data-toggle="modal" data-target="#editMember{{ $member->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                                    {{ __('Member Edit') }}
                                </x-nav-link>
                                <x-nav-link data-toggle="modal" data-target="#deleteMember{{ $member->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                                    {{ __('Member Delete') }}
                                </x-nav-link>
                            @endif
                        @endif
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</x-app-layout>