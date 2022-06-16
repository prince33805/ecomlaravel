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

      <div style="padding: 75px 30px;" class="container-fluid page-body-wrapper">    
        <div style="padding-top:50px;" class="container mx-auto" align="center">
            <h1 style="font-size: 25px;">All Orders</h1>
            <br>
            <table class="table table-dark" style="color:aliceblue;width:1000px">
                {{-- style="background-color:black;" --}}
                <tr align="center">
                  <td style="padding:15px;font-size:15px;">Id</td>
                  <td style="padding:15px;font-size:15px;">Customer name</td>
                  <td style="padding:15px;font-size:15px;">Phone</td>
                  <td style="padding:15px;font-size:15px;">Total Price</td>
                  <td style="padding:15px;font-size:15px;">Total Quantity</td>
                  <td style="padding:15px;font-size:15px;">Status</td>
                  {{-- <td style="padding:15px;font-size:15px;">Action</td> --}}
                  <td style="padding:15px;font-size:15px;">View</td>
                  {{-- <td style="padding:15px;font-size:15px;">Download</td> --}}
                </tr>
                @foreach($order as $orders)
                <tr align="center">
                  {{-- <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden=""> --}}
                  <td style="padding:15px;font-size:15px;">{{$orders->id}}</td>
                  <td style="padding:15px;font-size:15px;">{{$orders->name}}</td>
                  <td style="padding:15px;font-size:15px;">{{$orders->phone}}</td>
                  <td style="padding:15px;font-size:15px;">{{$orders->totalprice}}</td>
                  <td style="padding:15px;font-size:15px;">{{$orders->totalquantity}}</td>
                  <td style="padding:15px;font-size:15px;">{{$orders->status}}</td>
                  {{-- @if($orders->status == 'delivered')
                    <td><a href="#" class="btn btn-secondary disabled">Delivered</a></td>
                  @else
                    <td><a href="{{url('updatestatus',$orders->id)}}" onclick="return confirm('Are you sure this product is delivered ?')" class="btn btn-success">Delivered</a></td>
                  @endif --}}
                  <td><a href="{{url('showorder',$orders->id)}}" class="btn btn-warning">View</a></td>
                  {{-- <td><a href="{{url('print_pdf',$orders->id)}}" class="btn btn-secondary">Print PDF </a></td> --}}
                </tr>
                @endforeach
            </table>
        </div>
      </div>

      @include('admin.script')
  </body>
</html>