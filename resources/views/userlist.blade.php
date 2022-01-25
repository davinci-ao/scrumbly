<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
@if(Auth::check() &&  Auth::user()->rights == 'admin' || Auth::user()->rights == 'superadmin')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Userlist') }}
            </h2>
        </x-slot>
        
        <div class='row m-0'>
            <div class='col-4 row align-content-start mt-4'>
            <h2>Superadmin</h2>
                @foreach($users as $user)
                    @if($user->rights == 'superadmin')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
            <div class='col-4 row align-content-start mt-4'>
            <h2>Admins</h2>
                @foreach($users as $user)
                    @if($user->rights == 'admin')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
            <div class='col-4 row align-content-start mt-4'>
            <h2>Users</h2>
                @foreach($users as $user)
                    @if($user->rights == 'user')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
        </div>

    </x-app-layout>
@endif