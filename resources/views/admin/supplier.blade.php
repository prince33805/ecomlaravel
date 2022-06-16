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
    <div class="container-fluid page-body-wrapper" style="padding: 75px 30px;">
        <div class="container" align="center">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            
            <h1 class="title">Add Supplier</h1>
            <form action="{{url('addsupplier')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding:15px;">
                <label>Supplier name :</label>
                <input style="color:black;" type="text" name="name" placeholder="Give a supplier name" required="">
            </div>
            <div style="padding:15px;">
                <label>Description :</label>
                <input style="color:black;" type="text" name="description" placeholder="Give a description" required="">
            </div>
            <div style="padding:15px;">
              <label>Address :</label>
              <input style="color:black;" type="text" name="address" placeholder="Give a address" required="">
            </div>
            <div style="padding:15px;">
              <label>Phone :</label>
              <input style="color:black;" type="text" name="phone" placeholder="Give a phone" required="">
            </div>
      
            <div style="padding:15px;">
                <input class="btn btn-outline-success btn-lg " type="submit" >
              </div>
            </form>

            <h1 class="title">All Supplier</h1>
            <table class="table table-dark" style="color:aliceblue;width:1000px"><br>
                <tr align="center">
                    <td style="padding: 20px;">ID</td>
                    <td style="padding: 20px;">Name</td>
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Phone</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">View</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @foreach($data as $i=>$data)
                <tr align="center" style="background-color: ; align-items:center;">
                    {{-- <td>{{$i+1}}</td> --}}
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->phone}}</td>
                    <td><a class="btn btn-primary" href="{{url('/supplier/updateview',$data->id)}}">Update</a></td>
                    <td><a class="btn btn-warning" href="{{url('/supplier',$data->id)}}">View</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are You sure?')" href="{{url('deletesupplier',$data->id)}}">Delete</a></td> 
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    @include('admin.script')

  </body>
</html>