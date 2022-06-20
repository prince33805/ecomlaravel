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
    @include('user.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    {{-- @include('user.banner') --}}
    <!-- Banner Ends Here -->
    <!-- ======================= -->
    
    <br>
    <div class="latest-products">
        <div class="container">
          {{-- <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                
                <form action="{{url('search')}}" method="get" class="form-inline" style="float: right;padding:10px;">
                  @csrf
                  <input class="form-control" type="search" name="search" placeholder="search">
                  <button class="btn btn-success">Search</button>
                </form>
              
              </div>
            </div> --}}
            <div class="row justify-content-center">
              <div class="col-md-5">
                <div class="product-item">
                  <a href="{{url('product_details',$product->id)}}"><img src="/productimage/{{$product->image}}" alt=""></a>
                  <div class="down-content">
                    <a href="{{url('product_details',$product->id)}}"><h4>{{$product->title}}</h4></a>
                    <h6>${{$product->price}}</h6>
                    <h4>Product Category : {{$product->category}}</h4> 
                    <h4>Available Quantity : {{$product->quantity}}</h4>
                    <p>Product Details : {{$product->description}}</p>  
    
                    <form action="{{url('addcart',$product->id)}}" method="POST">
                    @csrf  
                    <div class="row">
                      <div class="col-6">
                        <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity">
                      </div>
                      <div class="col-6 text-right">
                        <button class="btn btn-primary" style="width: 100px;" >Add Cart</button>
                      </div>
                    </div>
                  </form> 
    
    
                  </div>
                </div>
              </div>
            </div>

            {{-- @if(method_exists($data,'links'))
            <div class="d-flex justify-content-center">
              {!! $data->links() !!}
            </div>
            @endif --}}
  
          </div>
        </div>
  </div>

    @include('user.footer')
    
  </body>

</html>
