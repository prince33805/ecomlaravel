<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    @include('user.css')
    <style>
    td{
      background-color: rgba(255, 255, 255, 0.05);
    }
    th{
      background-color: #232323;
    }
    .title{
          color:black;
          padding:25px;
          font-size:25px;
      }
    </style>
    
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    @include('user.preloader')
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('user.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    {{-- @include('user.banner') --}}
    <!-- Banner Ends Here -->

    <!-- ======================= -->
    {{-- @include('user.product') --}}
    
    <div style="padding-top:100px;width:1000px;min-height: 750px" class="mx-auto" align="center">
      <h1 class="title">Order Details</h1>
      @foreach($orderheader as $orderheader)
      {{-- style="background-color: #343a40"  --}}
        <table class="table table-dark">
          <tbody>
            <tr>
              <th style="padding:10px;font-size:20px;">Order Id</th>
              <td class="align-middle"  >{{$orderheader->id}}</td>
              <th style="padding:10px;font-size:20px;">User Name</th>
              <td class="align-middle"  >{{$orderheader->name}}</td>
            </tr>
            <tr>
              <th style="padding:10px;font-size:20px;">Phone</th>
              <td class="align-middle"  >{{$orderheader->phone}}</td>
              <th style="padding:10px;font-size:20px;">Address</th>
              <td class="align-middle"  >{{$orderheader->address}}</td>
            </tr>
            <tr>
              <th style="padding:10px;font-size:20px;">Total Quantity</th>
              <td class="align-middle"  >{{$orderheader->totalquantity}}</td>
              <th style="padding:10px;font-size:20px;">Total Price</th>
              <td class="align-middle"  >{{$orderheader->totalprice}}</td>
            </tr>
            <tr>
              <th style="padding:10px;font-size:20px;">Created At</th>
              <td class="align-middle"  >{{$orderheader->created_at}}</td>
              <th style="padding:10px;font-size:20px;">Status</th>
              <td class="align-middle"  >{{$orderheader->status}}</td>
            </tr>
          </tbody>
        </table> 
      @endforeach

      <table class="table table-dark">
        <tr style="">
            <th style="padding:10px;font-size:20px;">No</th>
            <th style="padding:10px;font-size:20px;">Product Title</th>
            <th style="padding:10px;font-size:20px;">Price  Per Piece</th>
            <th style="padding:10px;font-size:20px;">Quantity</th>
            <th style="padding:10px;font-size:20px;">Total Price</th>
        </tr>
        @foreach($order as $i=>$row)
        <tr>
            <td class="align-middle">{{$i+1}}</td>
            {{-- <td>{{$row->id}}</td> --}}
            <td class="align-middle">{{$row->product_title}}</td>
            <td class="align-middle">{{$row->priceperpiece}}</td>
            <td class="align-middle">{{$row->quantity}}</td>
            <td class="align-middle">{{$row->price}}</td>
        </tr>
        @endforeach
      </table>  
    </div>

    {{-- @include('user.bestfeatures') --}}

    @include('user.footer')
    

  </body>

</html>
