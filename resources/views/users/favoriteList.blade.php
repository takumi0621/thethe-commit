@extends('layouts.app')

@section('content')

<ul class="media-list">
   
    
    @foreach ($countryDatas as $countryData)
      
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($countryData->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($countryData->content)) !!}</p>
                    <h3>{{ $countryData->district }}</h3>
                </div>
                <div>
    
                        {!! Form::open(['route' => ['user.unfavorites', $countryData->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Unfovorites', ['class' => 'btn btn-warning btn-sm']) !!}
                        {!! Form::close() !!}
            
                </div>
                
            </div>
        </li>
          
    @endforeach

</ul>
{{ $countryDatas->links('pagination::bootstrap-4') }}







@endsection