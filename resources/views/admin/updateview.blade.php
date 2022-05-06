<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
    {{-- @include('admin.body')   --}}
    
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            
            <h1 class="title">Update Product</h1>
            <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding:15px;">
                <label>Product title :</label>
                <input style="color:black;" type="text" name="title" value="{{$data->title}}" required="">
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
                <label>Price :</label>
                <input style="color:black;" type="number" name="price" value="{{$data->price}}" required="">
            </div>
            <div style="padding:15px;">
              <label>Discount Price :</label>
              <input style="color:black;" type="number" name="discount_price" value="{{$data->discount_price}}" required="">
            </div>
            <div style="padding:15px;">
                <label>Quantity :</label>
                <input style="color:black;" type="text" name="quantity" value="{{$data->quantity}}" required="">
            </div>
            <div style="padding:15px;">
              <label>Description :</label>
              <input style="color:black;" type="text" name="description" value="{{$data->description}}" required="">
            </div>
            {{-- <div style="padding:15px;">
              <label>created :</label>
              <input style="color:black;" type="text" name="description" value="{{$data->created_at}}" required="">
            </div> --}}
            <div style="padding:15px;">
                <label>Old Image</label>
                <img height="100" width="100" src="/productimage/{{$data->image}}">
                <input type="file" name="file">
            </div>
            <div style="padding:15px;">
                <input class="btn btn-success btn-lg" type="submit" value="Update">
            </div>
            </form>
        </div>
    </div> 

    @include('admin.script')
  </body>
</html>

