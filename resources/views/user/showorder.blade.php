<!DOCTYPE html>
<html lang="en">

  <head>
    
    <base href="/public">
    @include('user.css')
    <style type="text/css">
      .title{
          color:black;
          padding:25px;
          font-size:25px;
      }
      label{
        display:inline-block;
        width:200px;
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
    
    <div style="padding-top:100px;width:1000px;min-height: 700px;" class="mx-auto" align="center">
      <h1 class="title">Orders</h1>
      <table class="table table-striped table-dark">
          <tr style="">
              <td style="padding:10px;font-size:20px;">No</td>
              <td style="padding:10px;font-size:20px;">Name</td>
              <td style="padding:10px;font-size:20px;">Phone</td>
              <td style="padding:10px;font-size:20px;">Total Quantity</td>
              <td style="padding:10px;font-size:20px;">Total Price</td>
              <td style="padding:10px;font-size:20px;">Status</td>
              <td style="padding:10px;font-size:20px;">Created At</td>
              <td style="padding:10px;font-size:20px;">Action</td>
          </tr>
          @foreach($order as $i=>$row)
          <tr>
              <td class="align-middle">{{$i+1}}</td>
              {{-- <td>{{$row->id}}</td> --}}
              <td class="align-middle">{{$row->name}}</td>
              <td class="align-middle">{{$row->phone}}</td>
              <td class="align-middle">{{$row->totalquantity}}</td>
              <td class="align-middle">{{$row->totalprice}}</td>
              <td class="align-middle">{{$row->status}}</td>
              <td class="align-middle">{{$row->created_at}}</td>
              <td class="align-middle"><a href="{{url('order',$row->id)}}" class="btn btn-warning">View</a></td>
          </tr>
          @endforeach
      </table>    
    </div>

    {{-- @include('user.bestfeatures') --}}

    @include('user.footer')
    

  </body>

</html>
