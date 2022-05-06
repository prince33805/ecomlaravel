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
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            
            <h1 class="title">Add Category</h1>
            <form action="{{url('addcategory')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div style="padding:15px;">
                <label>Category title :</label>
                <input style="color:black;" type="text" name="category" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
                <input class="btn btn-outline-success btn-lg " type="submit" >
              </div>
            </form>

            <h1 class="title">All Category</h1>
            <table class="table table-dark" style="color:aliceblue;width:1000px"><br>
                <tr style="background-color:;" align="center">
                    <td style="padding: 20px;">No</td>
                    <td style="padding: 20px;">ID</td>
                    <td style="padding: 20px;">Title</td>
                    {{-- <td style="padding: 20px;">Update</td> --}}
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @foreach($data as $i=>$data)
                <tr align="center" style="background-color: ; align-items:center;">
                    <td>{{$i+1}}</td>
                    <td>{{$data->id}}</td>
                    <td>{{$data->category_name}}</td>
                    
                    {{-- <td><img height="100" width="100" src="/productimage/{{$product->image}}"></td>
                    <td><a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a></td>--}}
                    <td><a class="btn btn-danger" onclick="return confirm('Are You sure?')" href="{{url('deletecategory',$data->id)}}">Delete</a></td> 
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    
    @include('admin.script')
  </body>
</html>