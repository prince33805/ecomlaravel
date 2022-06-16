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
      {{-- @include('admin.status') --}}
      @include('admin.body') 

      @include('admin.footer')

      @include('admin.script')
      
  </body>
</html>