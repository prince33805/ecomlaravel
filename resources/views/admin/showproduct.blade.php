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
    <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            <h1 class="title">All Product</h1>
            <table class="table table-dark" style="color:aliceblue;width:1000px"><br>
                <tr style="background-color:;" align="center">
                    <td style="padding: 20px;">No</td>
                    <td style="padding: 20px;">ID</td>
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Category</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Discount Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Description</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @foreach($data as $i=>$product)
                <tr align="center" style="background-color: ; align-items:center;">
                    <td>{{$i+1}}</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->description}}</td>
                    <td><img height="100" width="100" src="/productimage/{{$product->image}}"></td>
                    <td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are You sure')" href="{{url('deleteproduct',$product->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('admin.script')
  </body>
</html>