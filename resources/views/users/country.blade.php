@extends('layouts.app')

@section('content')
@include('commons.navbar')
<div  class="country-one">
    <div class="country-two">
        <ul class="nav nav-tabs nav-justified mb-3">
            <li class="nav-item"><a href="{{ route('user.country', ['district' => 'europe']) }}" class="nav-linkss">ヨーロッパ <span class="badge badge-secondary">{{ $count_europe }}</span></a></li>
            <li class="nav-item"><a href="{{ route('user.country', ['district' => 'oceania']) }}" class="nav-link">オセアニア <span class="badge badge-secondary">{{ $count_oceania }}</span></a></li>
            <li class="nav-item"><a href="{{ route('user.country', ['district' => 'america']) }}" class="nav-link">アメリカ<span class="badge badge-secondary">{{ $count_america }}</span></a></li>
            <li class="nav-item"><a href="{{ route('user.country', ['district' => 'asia']) }}" class="nav-link">アジア  <span class="badge badge-secondary">{{ $count_asia }}</span></a></li>
            <li class="nav-item"><a href="{{ route('user.country', ['district' => 'africa']) }}" class="nav-link">アフリカ <span class="badge badge-secondary">{{ $count_africa }}</span></a></li>
        </ul>
    </div>
    
    <div class="country-three">
        
    </div>
    
    <div class="country-four">
         
        <h1>チャンスを探す</h1>
    
        @foreach($countryJobs as $countryJob)
         　 <div class="form-group">
                    {!! Form::label('name', '依頼主') !!}
                    <p class="form-control">{{ $countryJob->name }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('district', '地域') !!}
                    <p class="form-control">{{ $countryJob->district }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('genre', 'ジャンル') !!}
                    <p class="form-control">{{ $countryJob->genre }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('age', '年齢') !!}
                   <p class="form-control">{{ $countryJob->age }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('content', '内容') !!}
                    <p class="form-control">{{ $countryJob->content }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('requirement', '用件') !!}
                    <p class="form-control">{{ $countryJob->requirement }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('mail', 'メールアドレス') !!}
                    <p class="form-control">{{ $countryJob->mail }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('number', '電話番号') !!}
                    <p class="form-control">{{ $countryJob->number }}</p>
            </div>
            <div class="form-group">
                    {!! Form::label('picture', '写真') !!}
                    <img src="{{ $countryJob->picture }}" class="poster-image form-control">
            </div>
            
            <div class="container">
                <div class="row">
                     <div class="com-sm-6">
                        {!! link_to_route('user.chating', '連絡する', ['id' => $countryJob->id], ['class' => 'btn btn-lg btn-primary']) !!}
                     </div>
                    
                    <div class="com-sm-6">
                         @if (Auth::user()->is_favoriting($countryJob->id))
                            {!! Form::open(['route' => ['user.unfavorites', $countryJob->id], 'method' => 'delete']) !!}
                               {!! Form::submit('Unfovorites', ['class' => 'btn btn-warning btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                           {!! Form::open(['route' => ['user.favorites', $countryJob->id], 'method' => 'post']) !!}
                               {!! Form::submit('favorites', ['class' => 'btn btn-info btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
            
            
            
            
            
        @endforeach       
            
        
        
        
    </div>





</div>



@endsection