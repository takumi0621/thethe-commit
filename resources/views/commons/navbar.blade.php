<header class="navbar-one">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark"> 
            <a class=" navbar-two" href="/"><span class="fab-one fa-archway"></span>Successor</a>
            
             
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