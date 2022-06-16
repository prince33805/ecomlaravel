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
            {{-- {{$data}} --}}
            {{-- style="background-color: #343a40"  --}}
              <h1 class="title">Order Information</h1><br> 
              <table class="table table-dark" style="color:white;width:1000px">
                <tbody>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Order Id</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->id}}</td>
                    <th style="padding:10px;font-size:20px;">User Name</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->name}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Phone</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->phone}}</td>
                    <th style="padding:10px;font-size:20px;">Address</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->address}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Total Quantity</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->totalquantity}}</td>
                    <th style="padding:10px;font-size:20px;">Total Price</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->totalprice}}</td>
                  </tr>
                  <tr>
                    <th style="padding:10px;font-size:20px;">Created At</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->created_at}}</td>
                    <th style="padding:10px;font-size:20px;">Status</th>
                    <td class="align-middle" style="background-color: #2c3034" >{{$data->status}}</td>
                  </tr>
                </tbody>
              </table> 
      
              <br>
              <h1 class="title">Product</h1><br> 
            
              <table class="table table-dark" style="color:white;width:1000px">
                <tr>
                    <th style="padding:10px;font-size:20px;">No</th>
                    <th style="padding:10px;font-size:20px;">Product Title</th>
                    <th style="padding:10px;font-size:20px;">Price  Per Piece</th>
                    <th style="padding:10px;font-size:20px;">Quantity</th>
                    <th style="padding:10px;font-size:20px;">Total Price</th>
                </tr>
                @foreach($order as $i=>$row)
                <tr>
                    <td class="align-middle" style="background-color: #2c3034">{{$i+1}}</td>
                    {{-- <td>{{$row->id}}</td> --}}
                    <td class="align-middle" style="background-color: #2c3034">{{$row->product_title}}</td>
                    <td class="align-middle" style="background-color: #2c3034">{{$row->priceperpiece}}</td>
                    <td class="align-middle" style="background-color: #2c3034">{{$row->quantity}}</td>
                    <td class="align-middle" style="background-color: #2c3034">{{$row->price}}</td>
                </tr>
                @endforeach
              </table>

              <div class="row" style="padding: 50px;">
                <div class="col"  style="padding: 20px;">
                  <h1>Download PDF Here</h1><br> 
                  <a href="{{url('print_pdf',$data->id)}}" class="btn btn-secondary">Print PDF </a>
                </div>
                <div class="col" style="padding: 20px;">
                  <h1>Send Email Notification</h1><br> 
                  <a href="{{url('send_email',$data->id)}}" class="btn btn-primary">Send Email</a>
                </div>
                <div class="col" style="padding: 20px;">
                  <h1>Order Delivered</h1><br> 
                  @if($data->status == 'delivered')
                    <td><a href="#" class="btn btn-secondary disabled">Delivered</a></td>
                  @else
                    <td><a href="{{url('updatestatus',$data->id)}}" onclick="return confirm('Are you sure this order is delivered ?')" class="btn btn-success">Delivered</a></td>
                  @endif</div>
              </div>
        </div>
      </div>

      @include('admin.script')
  </body>
</html>