@extends('layouts.app')

@section('content')
<div class='poster-one'>
    
    {!! link_to_route('move.get', '投稿する', [], ['class' => 'btn btn-lg btn-primary']) !!}
    <h1　class="poster-one-title">現在依頼しているもの</h1>
    
    @if (count($jobs) > 0)
        <div class="row">
            <h3>{{ $jobs->title }}</h3>
            <aside class="col-sm-3">
               
                        <img src="{{ $jobs->picture}}">
                   
            </aside>
            <div class="col-sm-9">
               
                
                    <p>{{ $jobs->content }}</p>        
                    {!! link_to_route('signup.get', '編集する', [], ['class' => 'btn btn-lg btn-primary']) !!}
                
            </div>
        </div>
    @endif
    
    
    
    
    <div class="poster-name-one">
        <p>希望者</p>        
    </div>
    
    <div class="poster-contracter">
        
        
        
        
        
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="poster-name-two">
        <P>受注成立者</P>
    </div>
    
    
    <div class="poster-partner">
          @if (count($worker) > 0)
          
          <div class="row">
            <h1>{{ $job->title }}について</h1>
            
            <aside class="col-sm-3">
                        <h3>{{ $worker->name }}</h3>
                        <img src="{{ $jobs->picture}}">
                   
            </aside>
            <div class="col-sm-9">
               
                
                    <p>{{ $workers->conteent }}</p>        
                    
                
            </div>
            {!! link_to_route('signup.get', '連絡する', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    @endif
          
          
    </div>
        
        
        
    
    
    
    
    
    
</div>



@endsection

