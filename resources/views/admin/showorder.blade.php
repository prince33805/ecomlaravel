<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      {{-- @include('admin.body')   --}}

      <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
        <div style="padding-top:50px;" class="container mx-auto" align="center">
            <h1 style="font-size: 25px;">All Orders</h1>
            <br>
            <table class="table table-dark" style="color:aliceblue;width:1000px">
                {{-- style="background-color:black;" --}}
                <tr align="center">
                    <td style="padding:15px;font-size:15px;">Customer name</td>
                    <td style="padding:15px;font-size:15px;">Phone</td>
                    <td style="padding:15px;font-size:15px;">Address</td>
                    <td style="padding:15px;font-size:15px;">Product title</td>
                    <td style="padding:15px;font-size:15px;">Price</td>
                    <td style="padding:15px;font-size:15px;">Quantity</td>
                    <td style="padding:15px;font-size:15px;">Status</td>
                    <td style="padding:15px;font-size:15px;">Action</td>
                </tr>
                @foreach($order as $orders)
                <tr align="center">
                    {{-- <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden=""> --}}
                    <td style="padding:15px;font-size:15px;">{{$orders->name}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->phone}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->address}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->product_name}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->price}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->quantity}}</td>
                    <td style="padding:15px;font-size:15px;">{{$orders->status}}</td>
                    <td><a href="{{url('updatestatus',$orders->id)}}" class="btn btn-success">Delivered</a></td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>

      @include('admin.script')
  </body>
</html>