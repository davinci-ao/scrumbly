<div class="row m-5 bg-white rounded col-12 col-md-2 col-lg-2">
    <div class='userblock'>
        <p>{{$user->name}}</p>
        <p>id = {{$user->id}}</p>
        <a href="{{route('userlist.delete', $user->id)}}"><input type="button" value="delete"></a>
    </div>
</div>
