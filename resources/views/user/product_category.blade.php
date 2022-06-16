<div id="product"></div>

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>All Products</h2><hr>
        </div>
        <div class="section-category">
          <h5>Product by Category :</h5>
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
              {{$category_name}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach($category as $category)
              <a class="dropdown-item" href="{{url('product_category',$category->category_name)}}">{{$category->category_name}}</a>
              @endforeach
            </div>
          </div>

          <div class="form">
            <form action="{{url('search')}}" method="get" class="form-inline">
              @csrf
              <input class="form-control" type="search" name="search" placeholder="search">
              &nbsp;&nbsp;<button class="btn btn-success">Search</button>
            </form>
          </div>
        </div>

      </div>
{{-- {{$category_name}}
{{$data}} --}}
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