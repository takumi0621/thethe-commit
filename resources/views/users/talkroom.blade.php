@extends('layouts.app')

@section('content')
    @include('commons.navbar')
    <div class="talk-one">
        <div class="talk-two">
             <div class="container">
               
                     <div class="row">
                         <div class="col-sm-3">
                                  <h3>{{ $job->title }}について</h3>
                                   
                         </div>
                         <div class="col-sm-9">
                                  <h3></h3>
                         </div>
                     </div>
           
             </div>
        </div>
     
         <div class="talk-three">
             <div class="container">
                {{Form::open(['route' => ['user.talk',  $user->id]])}} 
                 {{Form::hidden('job_id', $job->id)}}
                 {{Form::hidden('user_id', $user->id)}}
                 
                     <div class="col-sm-3">
                         {!! Form::submit('Go', ['class' => 'btn btn-primary btn-block']) !!}
                         
                     </div>
                     <div class="col-sm-9">
                         {!! Form::textarea('talk', old('talk'), ['class' => 'form-control', 'rows' => '2']) !!}
                     </div>
                 {!! Form::close() !!}
            
             

                <ul class="media-list">
                    @foreach ($talks as $talk)
                     
                    　　<div class="row">
                            <div class="col-sm-2">
                                <li class="media mb-3">{!! nl2br(e($talk->user->name)) !!}</li>
                                <h3>{{ $talk->user_id }}について</h3>
                            </div> 
                            <div class="col-sm-10 talkroom-one">
                                <li class="media mb0-3">{!! nl2br(e($talk->talk)) !!}</li>
                            </div>
                        </div>
                        @if (Auth::id() == $talk->user_id)
                            {!! Form::open(['route' => ['jobs.destroydestroy', $talk->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            {!! link_to_route('job.editing', '編集する', ['id' => $talk->id], ['class' => 'btn  btn-primary']) !!}
                        @endif
                     
                        @if (Auth::id() != $talk->user_id && Auth::id() == $job->user_id)
                            {!! Form::open(['route' => ['user.Allowing', $job->id], 'method' => 'post']) !!} 
                               {{Form::hidden('UserID', $talk->user_id)}}
                                {!! Form::submit('受注許可', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                        
                    　　
                    　　
                    　　
                    　　　
                    @endforeach
                </ul>
                
                
                
            </div> 
         </div>
     
     
     </div>


@endsection



                       
            
            
 

                       
            
            
           