<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
      .title{
            color:white;
            padding:25px;
            font-size:25px;
        }
      label{
          display:inline-block;
          width:200px;
          font-size: 17.5px;
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
            <h1 class="title">Send Email to {{$order->name}} 
              @foreach ($user as $row)
              ({{$row->email}})
              @endforeach
            </h1>

            <form action="{{url('send_user_email',$order->id)}}" method="post" enctype="multipart/form-data">
              @csrf
            <div style="padding:15px;">
                <label>Email Greeting :</label>
                <input style="color:black;" type="text" name="greeting" placeholder="Give" required="">
            </div>

            <div style="padding:15px;">
              <label>Email FirstLine :</label>
              <input style="color:black;" type="text" name="firstline" placeholder="Give" required="">
            </div>
          
            <div style="padding:15px;">
                <label>Email Body :</label>
                <input style="color:black;" type="text" name="body" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
              <label>Email Button name :</label>
              <input style="color:black;" type="text" name="button" placeholder="Give" required="">
            </div>

            <div style="padding:15px;">
                <label>Email Url :</label>
                <input style="color:black;" type="text" name="url" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
              <label>Email Last Line :</label>
              <input style="color:black;" type="text" name="lastline" placeholder="Give" required="">
            </div>
            <div style="padding:15px;">
                <input class="btn btn-outline-success btn-lg" type="Submit" value="Send Email">
              </div>
            </form>
        </div>
          
      </div>
      </div>

      @include('admin.script')
  </body>
</html>