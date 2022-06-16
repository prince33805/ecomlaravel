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
    <br>
    <!-- ======================= -->
    @include('user.product_category')

    {{-- @include('user.bestfeatures') --}}

    @include('user.footer')
    

  </body>

</html>
