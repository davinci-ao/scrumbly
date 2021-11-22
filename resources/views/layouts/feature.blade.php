<div class="row m-2 bg-white rounded col-12 col-md-6 col-lg-4">
    <div>
        <h3>{{ $feature->name }}</h3>
        @include('layouts.delete-feature')
        <a data-toggle="modal" data-target="#deleteFeature{{ $feature->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Delete Feature') }}
        </a>

        @include('layouts.edit-feature')
        <a data-toggle="modal" data-target="#editFeature{{ $feature->id }}" class="text-decoration-none ml-auto font-semibold  hover:text-gray-600 text-xl text-gray-800 leading-tight">
            {{ __('Edit Feature') }}
        </a>
    </div>
</div>