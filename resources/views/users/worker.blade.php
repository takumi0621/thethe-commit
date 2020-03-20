@extends('layouts.app')

@section('content')
@include('commons.navbar')
<div class="worker-one">
    <h1>
        世界の多くのチャンスを探しまししょう
    </h1>
    
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                      <a class="welcome-country" href="https://www.lamborghini.com/jp-en">
                        {!! link_to_route('user.country', 'ヨーロッパ', ['district' => 'europe'], ['class' => 'nav-link']) !!}
                        <img src="https://stworld.jp/feature/europe/images/slide_04.jpg" class="welcome-three-one">
                      </a>
                      
                      <div class="welcome-country">
                         {!! link_to_route('user.country', 'オセアニア', ['district' => 'oceania'], ['class' => 'nav-link']) !!}
                         <img src="https://www.img-ikyu.com/contents/global/images/area/pf.jpg?interpolation=progressive-bilinear&fit=around%7C1924:*&crop=w:1000;*,*" class="welcome-three-one">
                      </div>    
                      <div class="welcome-country">
                         {!! link_to_route('user.country', 'アメリカ', ['district' => 'america'], ['class' => 'nav-link']) !!}
                         <img src="https://www.kaplaninternational.com/jp/blog/files/inline-images/JP_Blog_places_to_visits_in_US.jpg" class="welcome-three-one">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="welcome-country">
                            {!! link_to_route('user.country', 'アジア', ['district' => 'asia'], ['class' => 'nav-link']) !!}
                            <img src="https://dr91yhkmywk3x.cloudfront.net/blog/wp-content/uploads/2018/11/01142215/bridge-3616616_1920.jpg" class="welcome-three-one">
                        </div>
                        <div class="welcome-country">
                            {!! link_to_route('user.country', 'アフリカ', ['district' => 'africa'], ['class' => 'nav-link']) !!}
                            <img src="https://www.dososhin.com/img/feature/00047/02.jpg" class="welcome-three-one">
                        </div> 
                    </div>
                </div>
           </div>
　
</div>


    
    <div class="container">
        <h1 class="worker-two-title">
            受注している仕事
        </h1>
        @if($myjobs->count() > 0)
            @foreach($myjobs as $myjob)
                <div class"work-two">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3></h3>
                            <img src="{{ $myjob->picture}}">
                        </div>
                        <div class="col-sm-9">
                            
                        </div>
                        <h1>依頼者　{{ $myjob->name }}</h1>
                        <h3 class="work-two-height">{{ $myjob->content }}</h3>
                    </div>
                    <h1>{!! link_to_route('poster.chating', '連絡する', [$myjob->id], ['class' => 'btn btn-lg btn-primary']) !!}</h1>
                    <h3 class="work-two-height">会話　{{ $myjob->endtalk() }}</h3>
                    <h3 class="work-two-height">名前　{{ $myjob->endtalkForname() }}</h3>
                </div>    
            @endforeach
        @else
            <div class="container">
                <h1>受注中の仕事はありません</h1>
            </div>    
        @endif
        <h1>{!! link_to_route('poster.chating', '連絡する', [$myjob->id], ['class' => 'btn btn-lg btn-primary']) !!}</h1>
    </div>









<div class="work-three">
    
</div>










abcdefghijklmnopqrstuvwxyasdfgsdfasdfasfasasf
asfdasasfdasfdasfdadafSSasdfadfasf



@endsection




