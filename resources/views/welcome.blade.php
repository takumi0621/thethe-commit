@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class='separate-one'>
        @include('commons.navbar')　
            <div class="container"> 
                <div class="row">
                   <div class="col-sm-6">
                       {!! link_to_route('separate.poster', '依頼者です', [], ['class' => 'btn btn-lg btn-primary']) !!}
                   </div>
                   <div class="col-sm-6">
                       {!! link_to_route('separate.contracter', '受注者です', [], ['class' => 'btn btn-lg btn-primary']) !!}
                   </div>
                </div>
            </div>
       </div>
    @else
        <div class="welcome-before-one">
            <header>
                <div class="container">
                    <nav class="navbar navbar-expand-sm navbar-dark  navbar-one"> 
                   
                        <p class="navbar-two"><span class="fab-one fa-archway"></span>{!! link_to_route('user.country', 'Successor', ['district' => 'europe'], ['class' => 'navbar-two', 'nav-link']) !!}</p>
                         
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="nav-bar">
                            <ul class="navbar-nav mr-auto"></ul>
                            <ul class="navbar-nav">
                                @if (Auth::check())
                                    <li class="nav-item nav-hello-one">{{ Auth::user()->name }}さんこんにちは</li>
                                    <li class="nav-item">{!! link_to_route('separate.favorite', 'お気に入り', [], ['class' => 'nav-link']) !!}</li>
                                    <li class="nav-item">{!! link_to_route('separate.poster', '仕事を依頼する', [], ['class' => 'nav-link']) !!}</li>
                                    <li class="nav-item">{!! link_to_route('separate.contracter', '仕事を探す', [], ['class' => 'nav-link']) !!}</li>
                                    <li class="nav-item">{!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link']) !!}</li>
                                    
                                   
                                @else
                                    <li class="nav-item navbar-white">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                                    <li class="nav-item navbar-white">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                                    
                                    
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
        </div>
    



        <div class="welcome-one">
            <div class="containr">
                <div class="welcome-one-one pt-4">
                        <div class="slide-wrapper">
                            <h2 class="slide-title">私たちのコミットメント</h2>
                            <div class="change-btn-wrapper">
                              <div class="change-btn prev-btn">← 前へ</div>
                              <div class="change-btn next-btn">次へ →</div>
                            </div>
                            <ul class="slides">
                              <li class="slide active slide-one"><img src="https://d1som9eclaj1c0.cloudfront.net/upload_picture/9f9cd0dab39d3936b59abbce906dfd14693137f8.jpg"></li>
                              <li class="slide slide-two"><img src="https://www.arita.jp/news/upload/180606_1.jpg"></li>
                              <li class="slide slide-three"><img src="https://cdn-ak.f.st-hatena.com/images/fotolife/K/KantaHara/20171228/20171228201518.jpg"></li>
                              <li class="slide slide-four"><img src="https://dr91yhkmywk3x.cloudfront.net/blog/wp-content/uploads/2017/12/24191828/mukiibi-elijah-377616.jpg"></li>
                            </ul>
                            <div class="index-btn-wrapper">
                              <div class="index-btn">1</div>
                              <div class="index-btn">2</div>
                              <div class="index-btn">3</div>
                              <div class="index-btn">4</div>  
                            </div>
                        </div>
                        <script type="text/javascript" src="js/script.js"></script>              
                </div>
            </div> 
        </div>
        
        <div class="welcome-two">
            <div class="welcome-two-one">
                <div class="container">
                    <div class="welcome-two-welcome">Successorへようこそ</div>
                    {!! link_to_route('signup.get', 'いますぐ始める', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    <div class="welcome-two-two">
                        <h1>現在人口の多い国でも出生率が下がり人口減少が起こりますそこで問題になるのは人手不足です、世界には人手不足や後継者不足によって経営難に陥ったり廃業に追い込まれる企業、失われる文化が��る一方。職に恵まれず仕事を探している人や新しいことにチャレンジしたいが周り同じものはいやだ、何か文化的遺産に携わりたいがどうすればいいかわからないという方がたくさんいます。
                        このサイトはそういった方々の需要と供給を理解し新しいチャレンジをのサポートをするという理念のもと創設されました</h1>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="welcome-three">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="welcome-country" href="https://www.lamborghini.com/jp-en">
                           {!! link_to_route('user.country', 'ヨーロッパ', ['district' => 'europe'], ['class' => 'nav-link']) !!}
                           <img src="https://stworld.jp/feature/europe/images/slide_04.jpg" class="welcome-three-one">
                        </div>
                      
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
        
<div style='margin: 0px;height: 800px;width: 800px;'>
    <!--data-intervalの秒数を変更すると、自動スライドの時間も変更される-->
    <!--ID carousel-example-genericで全体を囲み、ページ内リンクの設定を行う-->
    <!--data-ride="carousel"で即座にアニメーションの開始-->
    <div id="carousel-sample" class="carousel slide" data-interval=1000 data-ride="carousel">
        <!-- 以下は画像下部の■ ■ ■の部分の設定-->
        <!-- class="active"で初期に表示される画像を設定している-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-sample" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-sample" data-slide-to="1"></li>
            <li data-target="#carousel-sample" data-slide-to="2"></li>
        </ol>

        <!--画像スライドの中身-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-75"
                     src="https://s3-ap-northeast-1.amazonaws.com/images.programming-beginner-zeroichi.jp/uploads/sample1.jpeg"
                     alt="1枚目">
                <div class="carousel-caption d-none d-md-block">
                    <h5>トランプ大統領</h5>
                    <p>酒もタバコもいらない</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://s3-ap-northeast-1.amazonaws.com/images.programming-beginner-zeroichi.jp/uploads/sample2.jpeg"
                     alt="2枚目">
                <div class="carousel-caption d-none d-md-block">
                    <h5>ヒラリー・クリントン</h5>
                    <p>甥っ子がイケメン</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://s3-ap-northeast-1.amazonaws.com/images.programming-beginner-zeroichi.jp/uploads/sample3.jpeg"
                     alt="3枚目">
            </div>
        </div>

        <!-- 左 右の矢印の設定 -->
        <a class="carousel-control-prev" href="#carousel-sample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">戻る</span>
        </a>
        <a class="carousel-control-next" href="#carousel-sample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">次へ</span>
        </a>
    </div>
</div>
        
    @endif

@endsection