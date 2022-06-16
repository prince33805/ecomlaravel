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
            <h1 style="font-size: 25px;">All Users</h1>
            <br>
            <table class="table table-dark" style="color:aliceblue;width:1000px">
                {{-- style="background-color:black;" --}}
                <tr align="center">
                  <td style="padding:15px;font-size:15px;">Id</td>
                  <td style="padding:15px;font-size:15px;">Customer name</td>
                  <td style="padding:15px;font-size:15px;">Phone</td>
                  <td style="padding:15px;font-size:15px;">Email</td>
                  <td style="padding:15px;font-size:15px;">Address</td>
                  <td style="padding:15px;font-size:15px;">View</td>
                </tr>
                @foreach($user as $row)
                <tr align="center">
                  <td style="padding:15px;font-size:15px;">{{$row->id}}</td>
                  <td style="padding:15px;font-size:15px;">{{$row->name}}</td>
                  <td style="padding:15px;font-size:15px;">{{$row->phone}}</td>
                  <td style="padding:15px;font-size:15px;">{{$row->email}}</td>
                  <td style="padding:15px;font-size:15px;">{{$row->address}}</td>
                  <td><a href="{{url('viewuser',$row->id)}}" class="btn btn-warning">View</a></td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>


      @include('admin.script')
  </body>
</html>