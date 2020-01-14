@extends('layouts.app')

@section('content')



    <div class="post">
        <h1>チャンスを提供する</h1>
    
        {!! Form::open(['route' => 'jobs.']) !!}
         　 <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('district', '地域') !!}
                    {!! Form::text('district', old('district'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('genre', 'ジャンル') !!}
                    {!! Form::text('genre', old('genre'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('age', '年齢') !!}
                    {!! Form::text('age', old('age'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('content', '内容') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('requirement', '用件') !!}
                    {!! Form::text('requirement', old('requirement'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('mail', 'メールアドレス') !!}
                    {!! Form::text('mail', old('mail'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('number', '電話番号') !!}
                    {!! Form::text('number', old('number'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('picture', '写真') !!}
                    {!! Form::text('picture', old('picture'), ['class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    
    </div>
    






@endsection