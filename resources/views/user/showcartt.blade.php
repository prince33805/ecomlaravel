<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    @include('user.css')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    @include('user.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('redirect')}}"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="{{url('redirect')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              {{-- <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{url('aboutus')}}">About Us</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li> --}}

              <li class="nav-item">
              @if (Route::has('login'))

                    @auth

                    <li class="nav-item active">
                      <a class="nav-link" href="{{url('showcart')}}">Cart[{{$count}}]</a>
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
               </li>

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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    {{-- @include('user.banner') --}}
    <!-- Banner Ends Here -->
    <!-- ======================= -->

    <div style="padding-top:100px;width:1000px;" class="mx-auto" align="center">
      <table class="table table-striped table-dark">
          <tr style="">
              <td style="padding:10px;font-size:20px;">Product Name</td>
              <td style="padding:10px;font-size:20px;">Quantity</td>
              <td style="padding:10px;font-size:20px;">Price</td>
              <td style="padding:10px;font-size:20px;">Action</td>
          </tr>

          <form action="{{url('order')}}" method="POST">
            @csrf
            @foreach($cart as $carts)
            <tr>
                <td><input type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">{{$carts->product_title}}</td>
                <td><input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="">{{$carts->quantity}}</td>
                <td><input type="text" name="price[]" value="{{$carts->price}}" hidden="">{{$carts->price}}</td>
                <td><a href="{{url('delete',$carts->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
      </table>
            @if($count != 0)
              <button class="btn btn-success">Confirm Order</button>
            @endif
          </form>
    </div>

    @include('user.footer')  
  </body>

</html>
