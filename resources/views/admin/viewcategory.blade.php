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

      <div style="padding: 75px 30px;" class="container-fluid page-body-wrapper">
        <div style="padding-top:0px;" class="container mx-auto" align="center">
            
          @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
          </div>
          @endif
          
          <h1 class="title">Update Category</h1>
          <form action="{{url('/category/update',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding:15px;">
              <label>Id :</label>
              <label>{{$data->id}}</label>
              {{-- <input style="color:black;" type="text" name="id" value="{{$data->id}}" disabled=""> --}}
          </div>
          <div style="padding:15px;">
              <label>Category Name :</label>
              <input style="color:black;" type="text" name="category_name" value="{{$data->category_name}}" required="">
          </div>
          <div style="padding:15px;">
              <input class="btn btn-success btn-lg" type="submit" value="Update">
          </div>
          </form>

            {{-- {{$data}} --}}
            {{-- style="background-color: #343a40"  --}}
            <h1 class="title">Category Information</h1><br> 
              <table class="table table-dark" style="color:white;width:1000px">
                <tbody>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Id</th>
                    <th style="padding:10px;font-size:20px;">Name</th>
                    <th style="padding:10px;font-size:20px;">Created At</th>
                  </tr>
                  <tr>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->id}}</td>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->category_name}}</td>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->created_at}}</td>
                  </tr>
                  
                </tbody>
              </table> 

              <br>

              <h1 class="title">Products</h1>
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
                </tr>
                @forelse($product as $i=>$product)
                <tr align="center" style="background-color: ; align-items:center;">
                    {{-- <td>{{$i+1}}</td> --}}
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->supplier}}</td>
                    <td>{{$product->buy_price}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><img height="100" width="100" src="/productimage/{{$product->image}}"></td>
                    {{-- <td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a></td> --}}
                    
                    <td><a href="{{url('/updateview',$product->id)}}" class="btn btn-primary">Update</a></td>
                
                    <td><a class="btn btn-warning" href="{{url('showproduct',$product->id)}}">View</a></td>
                    {{-- <td><a class="btn btn-danger" onclick="return confirm('Are You sure')" href="{{url('deleteproduct',$product->id)}}">Delete</a></td> --}}
                </tr>
                @empty
                <tr>
                  <td colspan="10" style="text-align: center">
                    No Data Found
                  </td>
                </tr>
                @endforelse
              </table>
            
      
        </div>
      </div>

      @include('admin.script')
  </body>
</html>