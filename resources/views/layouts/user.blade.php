<div class="row m-5 bg-white rounded col-12 col-md-2 col-lg-2">
    <div class='userblock'>
        <p>{{$user->name}}</p>
        <p>id = {{$user->id}}</p>

        @if(Auth::check() &&  Auth::user()->rights == 'superadmin' && $user->rights != 'superadmin')
            @include('layouts.edit-user')
            <a data-toggle="modal" data-target="#editUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Edit') }}
            </a>
            @include('layouts.delete-user')
            <a data-toggle="modal" data-target="#deleteUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Delete') }}
            </a>
        @elseif($user->rights == 'user')
            @include('layouts.edit-user')
            <a data-toggle="modal" data-target="#editUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Edit') }}
            </a>
            @include('layouts.delete-user')
            <a data-toggle="modal" data-target="#deleteUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Delete') }}
            </a>
        @endif
    </div>
</div>
