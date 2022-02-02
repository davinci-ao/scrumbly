<div class="rounded col-12">
    <div class='userblock bg-white m-2 p-3 rounded'>
        <p class="w-100">
        <b>User: </b>{{$user->name }}
        </br>
        <b>Email: </b>{{$user->email}}
        </p>

        @if(Auth::check() &&  Auth::user()->rights == 'superadmin' && $user->rights != 'superadmin')
            @include('layouts.edit-user')
            <a data-toggle="modal" data-target="#editUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Edit') }}
            </a>
            @include('layouts.delete-user')
            <a data-toggle="modal" data-target="#deleteUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold btn btn-danger  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Delete') }}
            </a>
        @elseif($user->rights == 'user')
            @include('layouts.edit-user')
            <a data-toggle="modal" data-target="#editUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold btn btn-warning  hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Edit') }}
            </a>
            @include('layouts.delete-user')
            <a data-toggle="modal" data-target="#deleteUser{{ $user->id }}" class="text-decoration-none ml-auto font-semibold btn btn-danger hover:text-gray-600 text-xl text-gray-800 leading-tight">
                {{ __('Delete') }}
            </a>
        @endif
    </div>
</div>
