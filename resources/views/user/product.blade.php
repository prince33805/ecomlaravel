<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>All Products</h2>
          {{-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> --}}
          
          <form action="{{url('search')}}" method="get" class="form-inline" style="float: right;padding:20px;">
            @csrf
            <input class="form-control" type="search" name="search" placeholder="search">
            &nbsp;&nbsp;<button class="btn btn-success">Search</button>
            {{-- <input class="btn btn-outline-success" type="submit" value="search"> --}}
          </form>
        
        </div>
      </div>

      @foreach($data as $product)
      <div class="col-md-4">
        <div class="product-item">
          <a href="{{url('product_details',$product->id)}}"><img height="300" width="150" src="/productimage/{{$product->image}}" alt=""></a>
          <div class="down-content">
            <a href="{{url('product_details',$product->id)}}"><h4>{{$product->title}}</h4></a>
            <h6>${{$product->price}}</h6>
            <p>{{$product->description}}</p>
            
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
      @endforeach
  
    </div>

    @if(method_exists($data,'links'))
    <div class="d-flex justify-content-center">
      {!! $data->links() !!}
    </div>
    @endif

  </div>
</div>