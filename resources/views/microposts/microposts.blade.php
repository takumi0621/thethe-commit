<ul class="media-list">
    @foreach ($microposts as $micropost)
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
                    
                    @if (Auth::id() == $micropost->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif  
                    
                    
                    
                    
                    
                    
                    
                    
                        @if (Auth::user()->is_favoriting($micropost->id))
                            {!! Form::open(['route' => ['user.unfavorites', $micropost->id], 'method' => 'delete']) !!}
                               {!! Form::submit('Unfovorites', ['class' => 'btn btn-warning btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                           {!! Form::open(['route' => ['user.favorites', $micropost->id], 'method' => 'post']) !!}
                               {!! Form::submit('favorites', ['class' => 'btn btn-info btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    





                   @if (Auth::id() != $micropost->user_id)
                      @if (Auth::user()->is_following($micropost->user_id))
                         {!! Form::open(['route' => ['user.unfollow', $micropost->user_id], 'method' => 'delete']) !!}
                            {!! Form::submit('Unfollow', ['class' => "btn btn-danger btn-sm"]) !!}
                         {!! Form::close() !!}
                      @else
                         {!! Form::open(['route' => ['user.follow', $micropost->user_id]]) !!}
                            {!! Form::submit('Follow', ['class' => "btn btn-primary btn-sm"]) !!}
                         {!! Form::close() !!}
                      @endif
                   @endif          
                   
                   
      
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}