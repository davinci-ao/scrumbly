@if(Auth::check() &&  Auth::user()->rights == 'admin' || Auth::user()->rights == 'superadmin')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Userlist') }}
            </h2>
        </x-slot>
        
        @foreach($users as $user)
            @include('layouts.user', ['user' => $user])
        @endforeach

    </x-app-layout>
@endif