<!DOCTYPE html>
<html lang="en">

  <head>
    
    <base href="/public">
    @include('user.css')
    
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
    
    <div style="padding-top:100px;width:1000px;" class="mx-auto" align="center">
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
