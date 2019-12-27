@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favoriting($user->id))
        {!! Form::open(['route' => ['user.unfavorites', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorites', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorites', $user->id]]) !!}
            {!! Form::submit('Favorites', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif