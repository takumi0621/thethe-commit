

<ul class="media-list">
   
    
    @foreach ($microposts as $micropost)
      @if (Auth::id() != $micropost->id)   
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                <div>
                   
                    
                    
                       
                            {!! Form::open(['route' => ['user.unfavorites', $micropost->id], 'method' => 'delete']) !!}
                               {!! Form::submit('Unfovorites', ['class' => 'btn btn-warning btn-sm']) !!}
                            {!! Form::close() !!}
                        
                   
                    
                   @if (Auth::id() != $micropost->user->id)
                      @if (Auth::user()->is_following($micropost->user->id))
                         {!! Form::open(['route' => ['user.unfollow', $micropost->user->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-block"]) !!}
                         {!! Form::close() !!}
                      @else
                         {!! Form::open(['route' => ['user.follow', $micropost->user->id]]) !!}
                            {!! Form::submit('Follow', ['class' => "btn btn-primary btn-block"]) !!}
                         {!! Form::close() !!}
                      @endif
                   @endif                 
                </div>
            </div>
        </li>
        @endif    
    @endforeach

</ul>
{{ $microposts->links('pagination::bootstrap-4') }}