<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">
    @include('user.css')
    <style>
      .total_deg{
        font-size: 20px;
        padding: 40px;
      }
      .title{
          color:black;
          padding:25px;
          font-size:25px;
      }
    </style>
    
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    @include('user.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    {{-- <header class="">
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
              <li class="nav-item">
                <a class="nav-link" href="{{url('redirect')}}#product">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('aboutus')}}">About Us</a>
              </li>

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


    </header> --}}
    @include('user.header')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    {{-- @include('user.banner') --}}
    <!-- Banner Ends Here -->
    <!-- ======================= -->

    <div style="padding-top:100px;width:1000px;min-height: 750px;" class="mx-auto" align="center">
      <h1 class="title">Cart</h1>
      <table class="table table-striped table-dark">
          <tr style="">
              <td style="padding:10px;font-size:20px;">Product Name</td>
              <td style="padding:10px;font-size:20px;">Price Per Piece</td>
              <td style="padding:10px;font-size:20px;">Quantity</td>
              <td style="padding:10px;font-size:20px;">Price</td>
              <td style="padding:10px;font-size:20px;">Action</td>
          </tr>

          <form action="{{url('confirmorder')}}" method="POST">
            <?php $totalprice=0 ?>
            @csrf
            @foreach($cart as $cart)
              <tr>
                  <td class="align-middle"><input type="text" name="product_title[]" value="{{$cart->product_title}}" hidden="">{{$cart->product_title}}</td>
                  <td class="align-middle"><input type="text" name="priceperpiece[]" value="{{$cart->priceperpiece}}" hidden="">{{$cart->priceperpiece}}</td>
                  <td class="align-middle"><input type="text" name="quantity[]" value="{{$cart->quantity}}" hidden="">{{$cart->quantity}}</td>
                  <td class="align-middle"><input type="text" name="price[]" value="{{$cart->price}}" hidden="">{{$cart->price}}</td>
                  <td class="align-middle"><a href="{{url('delete',$cart->product_title)}}" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach
      </table>
            <div class="row">
               {{-- echo gettype($cart) ?> --}}
              <?php $totalquantity = $count  ?>
              <div class="col">
                <h1 class="total_deg">Total Quantity : {{$totalquantity}}</h1>
                <input type="text" name="totalquantity" value="{{$totalquantity}}" hidden="">
              </div>
              <div class="col">
                <h1 class="total_deg">Total Price : {{$totalprice}}</h1>
              <input type="text" name="totalprice" value="{{$totalprice}}" hidden="">
              </div>
              <div class="col">
                @if($count != 0)
                  <button class="btn btn-success" style="margin-top: 30px">Confirm Order</button>
                @endif
              </div>
            </div>
          </form>
    </div>

    @include('user.footer')  
  </body>

</html>
