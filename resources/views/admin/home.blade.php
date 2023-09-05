
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
   
      <!-- partial -->
     @include('admin.nav')
     @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
       {{-- @include('admin.body') --}}
        <!-- partial -->
       @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
   
    <!-- End custom js for this page -->
  </body>
</html>