<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><h2>XIBHO <em>Clothing</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              {{-- {{Request::is('/') ? 'nav-link active' : 'nav-link '}} --}}
              <a class="nav-link" href="{{url('/')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{url('/'.'#product')}}">Our Products</a>
            </li>
            
            <li class="nav-item">
              <a class="{{Request::is('aboutus') ? 'nav-link active' : 'nav-link '}}" href="{{url('aboutus')}}">About Us</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li> --}}

            @if (Route::has('login'))
                @auth
                  <li class="nav-item">
                    <a class="{{Request::is('order') ? 'nav-link active' : 'nav-link '}}" href="{{url('order')}}">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{Request::is('showcart') ? 'nav-link active' : 'nav-link '}}" href="{{url('showcart')}}">Cart[{{$count}}]</a>
                  </li>
                  <x-app-layout> 
                  </x-app-layout>
            @else
                  <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                @if (Route::has('register'))
                  <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endif
                  
                @endauth
            @endif

          </ul>
        </div>
      </div>
    </nav>

    @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
      </div>
    @endif


  </header>