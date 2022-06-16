<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('admin.css')
    <style type="text/css">
        .title{
            color:white;
            padding-top:25px;
            font-size:25px;
        }
        label{
          display:inline-block;
          width:200px;
        }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding: 75px 30px;">
        <div class="container" align="center">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            
            <h1 class="title">Add Product</h1>
            <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div style="padding:15px;">
                <label>Product title :</label>
                <input style="color:black;" type="text" name="title" placeholder="Give" required="">
            </div>
            
            <div style="padding:15px;">
              <label>Supplier :</label>
              <select style="color:black;width:220px" name="supplier" required="">
                <option value="" selected="">Add a supplier here</option>
                  @foreach($supplier as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                  @endforeach
              </select>
              {{-- <input style="color:black;" type="text" name="description" placeholder="Give" required=""> --}}
            </div>

            <div style="padding:15px;">
              <label>Product Category :</label>
              <select style="color:black;width:220px" name="category" required="">
                <option value="" selected="">Add a category here</option>
                @foreach($category as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
              </select>
              {{-- <input style="color:black;" type="text" name="description" placeholder="Give" required=""> --}}
            </div>
            
            <div style="padding:15px;">
              <label>Buy Price :</label>
              <input style="color:black;" type="number" name="buy_price" placeholder="Give" required="">
            </div>
          
            <div style="padding:15px;">
                <label>Price :</label>
                <input style="color:black;" type="number" name="price" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
              <label>Discount Price :</label>
              <input style="color:black;" type="number" name="discount_price" placeholder="Give" required="">
            </div>

            <div style="padding:15px;">
                <label>Quantity :</label>
                <input style="color:black;" type="text" name="quantity" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
              <label>Description :</label>
              <input style="color:black;" type="text" name="description" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
                <input type="file" name="file" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
                <input class="btn btn-outline-success btn-lg" type="Submit" >
              </div>
            </form>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>