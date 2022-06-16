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
    {{-- @include('admin.body')   --}}
    {{-- <div class="container-fluid page-body-wrapper">
      
      <div class="main-panel">
        <div class="content-wrapper"> --}}
    <div style="padding: 75px 30px;" class="container-fluid page-body-wrapper">
     
        <div class="container" align="center">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            <h1 class="title">All Product</h1>

            {{-- <div>
              <form class="row" style="width: 50%;margin:25px" method="get">
                <div class="col-6">
                  <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
                <div class="col-4" style="margin-left: -50px;">
                  <button type="submit" class="btn btn-success" style="padding:10px;width:50%">Search</button>
                </div>
              </form>
            </div> --}}

            <div style="margin-top: 25px;padding-bottom: 30px;">
              <form action="{{url('searchproduct')}}" mehtod="get">
                @csrf
                <input type="text" style="color: black" name="search" placeholder="Search">
                <input type="submit" value="Search" class="btn btn-outline-success" style="padding:12.5px ">
              </form>
            </div>

            <table class="table table-dark" style="color:aliceblue;width:1000px"><br>
                <tr style="background-color:;" align="center">
                    {{-- <td style="padding: 20px;">No</td> --}}
                    <td style="padding: 20px;">ID</td>
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Category</td>
                    <td style="padding: 20px;">Supplier</td>
                    <td style="padding: 20px;">Buy Price</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">View</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @forelse($data as $i=>$product)
                <tr align="center" style="background-color: ; align-items:center;">
                    {{-- <td>{{$i+1}}</td> --}}
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->supplier}}</td>
                    <td>{{$product->buy_price}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><img src="/productimage/{{$product->image}}"></td>
                    {{-- <td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a></td> --}}
                    
                    <td><a href="{{url('/updateview',$product->id)}}" class="btn btn-primary">Update</a></td>
                
                    <td><a class="btn btn-warning" href="{{url('showproduct',$product->id)}}">View</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are You sure')" href="{{url('deleteproduct',$product->id)}}">Delete</a></td>
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center">
                    No Data Found
                  </td>
                </tr>
                @endforelse
            </table>
       
    @include('admin.script')
  </body>
</html>