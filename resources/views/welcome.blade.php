@extends('layouts.app')

@section('content')
   
    @if (Auth::check())
     
                    
                    
                    
                    
                    
        
        
        
        <div class="welcome-three">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="welcome-country">
                        <h1>ヨーロッパ</h1>
                        <img src="https://cdn.omni-links.com/tourimages/thumb/b7f0aa81a31e70acbe2f25b877feeb99_thumb_1680x1280.jpg" class="welcome-three-one">
                      </div>    
                      <div class="welcome-country">
                         <h1>オセアニア</h1>
                         <img src="https://www.img-ikyu.com/contents/global/images/area/pf.jpg?interpolation=progressive-bilinear&fit=around%7C1924:*&crop=w:1000;*,*" class="welcome-three-one">
                      </div>    
                      <div class="welcome-country">
                         <h1>アメリカ</h1>    
                         <img src="https://www.kaplaninternational.com/jp/blog/files/inline-images/JP_Blog_places_to_visits_in_US.jpg" class="welcome-three-one">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="welcome-country">
                            <h1>東アジア</h1>
                            <img src="https://dr91yhkmywk3x.cloudfront.net/blog/wp-content/uploads/2018/11/01142215/bridge-3616616_1920.jpg" class="welcome-three-one">
                        </div>
                        <div class="welcome-country">
                            <h1>アフリカ</h1>
                            <img src="https://www.dososhin.com/img/feature/00047/02.jpg" class="welcome-three-one">
                       </div> 
                    </div>
                </div>
            </div>
            
        </div>
    
       
    @else
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
                        <h1>現在人口の多い国でも出生率が下がり人口減少が起こりますそこで問題になるのは人手不足です、世界には人手不足や後継者不足によって経営難に陥ったり廃業に追い込まれる企業、失われる文化がある一方。職に恵まれず仕事を探している人や新しいことにチャレンジしたいが周り同じものはいやだ、何か文化的遺産に携わりたいがどうすればいいかわからないという方がたくさんいます。
                        このサイトはそういった方々の需要と供給を理解し新しいチャレンジをのサポートをするという理念のもと創設されました</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="welcome-three">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        
                      <a class="welcome-country" href="https://www.lamborghini.com/jp-en">
                        <h1>ヨーロッパ</h1>
                        <img src="https://cdn.omni-links.com/tourimages/thumb/b7f0aa81a31e70acbe2f25b877feeb99_thumb_1680x1280.jpg" class="welcome-three-one">
                      </a>
                      
                      <div class="welcome-country">
                         <h1>オセアニア</h1>
                         <img src="https://www.img-ikyu.com/contents/global/images/area/pf.jpg?interpolation=progressive-bilinear&fit=around%7C1924:*&crop=w:1000;*,*" class="welcome-three-one">
                      </div>    
                      <div class="welcome-country">
                         <h1>アメリカ</h1>    
                         <img src="https://www.kaplaninternational.com/jp/blog/files/inline-images/JP_Blog_places_to_visits_in_US.jpg" class="welcome-three-one">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="welcome-country">
                            <h1>東アジア</h1>
                            <img src="https://dr91yhkmywk3x.cloudfront.net/blog/wp-content/uploads/2018/11/01142215/bridge-3616616_1920.jpg" class="welcome-three-one">
                        </div>
                        <div class="welcome-country">
                            <h1>アフリカ</h1>
                            <img src="https://www.dososhin.com/img/feature/00047/02.jpg" class="welcome-three-one">
                       </div> 
                    </div>
                </div>
            </div>
            
        </div>
        
        
        
    @endif

@endsection