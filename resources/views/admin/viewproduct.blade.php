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
      .table th img, .jsgrid .jsgrid-table th img,
      .table td img,
      .jsgrid .jsgrid-table td img{
        width: 80px;
        height: 80px;
        border-radius: 100%;
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
        <div style="padding-top:50px;" class="container mx-auto" align="center">
            {{-- {{$data}} --}}
            {{-- style="background-color: #343a40"  --}}
            <h1 class="title">Product Information</h1><br> 
              <table class="table table-dark" style="color:white;width:1000px;table-layout: fixed;">
                <tbody>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Id</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->id}}</td>
                    <th style="padding:10px;font-size:20px;">Title</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->title}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Price</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->price}}</td>
                    <th style="padding:10px;font-size:20px;">Buy Price</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->buy_price}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Quantity</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->quantity}}</td>
                    <th style="padding:10px;font-size:20px;">Category</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->category}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Created At</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->created_at}}</td>
                    <th style="padding:10px;font-size:20px;">Supplier</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->supplier}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Description</th>
                    <td class="align-middle" style="background-color: #2c3034;" >{{$data->description}}</td>
                    <th style="padding:10px;font-size:20px;">Image</th>
                    <td class="align-middle" style="background-color: #2c3034;"><img height="250px" width="250px" src="/productimage/{{$data->image}}"></td>
                  </tr>
                </tbody>
              </table> 
      
        </div>
      </div>

      @include('admin.script')
  </body>
</html>