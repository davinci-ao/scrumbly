<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
@if(Auth::check() &&  Auth::user()->rights == 'admin' || Auth::user()->rights == 'superadmin')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Userlist') }}
            </h2>
        </x-slot>
        
        <div class='userlistContainer'>
            <h1>Superadmin</h1>
            <div class='userblockContainer'>
                @foreach($users as $user)
                    @if($user->rights == 'superadmin')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
            <h1>Admins</h1>
            <div class='userblockContainer'>
                @foreach($users as $user)
                    @if($user->rights == 'admin')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
            <h1>Users</h1>
            <div class='userblockContainer'>
                @foreach($users as $user)
                    @if($user->rights == 'user')
                        @include('layouts.user', ['user' => $user])
                    @endif
                @endforeach
            </div>
        </div>

    </x-app-layout>
@endif