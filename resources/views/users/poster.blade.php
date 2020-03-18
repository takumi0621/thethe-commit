@extends('layouts.app')

@section('content')
    @include('commons.navbar')
    <div class='poster-one'>
        <h1>{!! link_to_route('user.asking', '仕事を投稿する', [], ['class' => 'btn btn-lg btn-primary']) !!}</h1>
        <h1 class="poster-one-name">現在依頼しているもの</h1>
    </div>
    
    @foreach($jobs as $job)
        <div class="poster-two-two"> 
            <div class="poster-two">
                <div class="poster-two-width">
                    @if($job->count() > 0)
                        <div class="row">
                            <div class="col-sm-1 ">
                                {!! link_to_route('job.editing', '編集する', ['id' => $job->id], ['class' => 'btn  btn-primary']) !!}
                                {!! Form::open(['route' => ['jobs.destroy', $job->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn']) !!}
                                {!! Form::close() !!} 
                                {!! link_to_route('poster.chating', 'チャットルームへ', ['id' => $job->id], ['class' => 'btn    btn-primary']) !!}
                            </div>
                            <div class="col-sm-11">
                                @if($job->status == 1)
                                    <h2>受注済です</h2>     
                                @endif
                                <div class="row">
                                        <div class="col-sm-3">
                                            タイトル
                                        </div>
                                        <div class="col-sm-9">
                                            {{ $job->title }}
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        
                                        <img src="{{ $job->picture }}" class="poster-image">
                                    </div>
                                    <div class="col-sm-9">
                                        <h1>内容</h1>
                                        <h5 class="poster-content">{{ $job->content }}</h5>    
                                    </div>        
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <h3>地域</h3>
                                        <h3>問い合わせ</h3>
                                    </div>
                                    <div class="col-sm-6">
                                       
                                        <h3 class="underline">{{ $job->district }}</h3>
                                        <h3 class="underline">{{ $job->number }}</h3>
                                    </div>
                                </div>
                                
                                <div class="row lasttalk underline">
                                    <div class="com-sm-4">
                                        <h1 class="underline">名前</h1>
                                        <p class="underline">{{ $job->endtalkForname() }}</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <h1 class="underline">会話</h1>
                                        <p class="underline">{{ $job->endtalk() }}</p>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </div>  
                        </div>        
                        
                        
                        
                                
                    @else 
                        <h1 color="white">仕事を依頼してみましょう</h1>
                    @endif
                </div>    
            </div> 
        </div>    
    @endforeach      
    
    
　
　　   
            
                                  
                          
       
    
        
    
        @foreach($jobs as $job)
　　　　    @if($job->worker->first()) 
                <div class="poster-four">
                    <div class="container">   
                        <div  class="poster-four-name">受注成立者</div>
                        
                        <div class="poster-partner">
                            <div class="row">
                                
                                <aside class="col-sm-3">
                                    
                                    <h3>{{ $job->worker->first()->name }}</h3>    
                                </aside>
                                <div class="col-sm-9">
                                    
                                    <h3>{{ $job->workerEndTalk()->talk }}</h3>       
                                </div>
                                {!! link_to_route('user.chating', '連絡する', ['id' => $job->id], ['class' => 'btn btn-lg btn-primary']) !!}
                            </div>    
                        </div>
                　  </div>
                </div>
            @else    
                <h1>ゆりゆり</h1>
            @endif
        @endforeach
    
    




@endsection




    

