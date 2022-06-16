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
      <div class="container-fluid page-body-wrapper" style="padding: 75px 30px;">
        <div class="container" align="center" style="padding-top:50px;">
      
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            
            <h1 class="title">Update Supplier</h1>
            <form action="{{url('/supplier/update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding:15px;">
                <label>Id :</label>
                <label>{{$data->id}}</label>
                {{-- <input style="color:black;" type="text" name="id" value="{{$data->id}}" disabled=""> --}}
            </div>
            <div style="padding:15px;">
                <label>Supplier Name :</label>
                <input style="color:black;" type="text" name="name" value="{{$data->name}}" required="">
            </div>
            <div style="padding:15px;">
                <label>Address :</label>
                <input style="color:black;" type="text" name="address" value="{{$data->address}}" required="">
            </div>
            <div style="padding:15px;">
              <label>Phone :</label>
              <input style="color:black;" type="text" name="phone" value="{{$data->phone}}" required="">
            </div>
            <div style="padding:15px;">
                <label>Description :</label>
                <input style="color:black;" type="text" name="description" value="{{$data->description}}" required="">
            </div>
            <div style="padding:15px;">
                <input class="btn btn-success btn-lg" type="submit" value="Update">
            </div>
            </form>
        </div>
      </div> 

      @include('admin.script')
  </body>
</html>