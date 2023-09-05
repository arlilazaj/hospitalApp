
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   <style>
     label{
        display: inline-block;
        width: 200px;
     }
    
   </style>
   @include('admin.css')
   <!-- Add these lines within your <head> section -->




  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
   
      <!-- partial -->
     @include('admin.nav')
     @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding-top: 100px;">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id='myAlert'>
                    {{session()->get('message')}}
                    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="dismissAlert()">
                        <span aria-hidden="true" style="padding-left: 50px;">X</span>
                    </button>
                </div>
                    

                @endif
                <script>
                    function dismissAlert() {
                        var alertElement = document.getElementById('myAlert');
                        alertElement.style.display = 'none';
                    }
                </script>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
            
                <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label>Doctor's Name:</label>
                        <input type="text" style="color:black;border-radius:15px;border:solid black" name='name'placeholder="Please write the name" >
                    </div>
                    <div style="padding: 15px;">
                        <label>Phone:</label>
                        <input type="number" style="color:black;border-radius:15px;border:solid black" name='phone'placeholder="Please write the number" >
                    </div>
                    <div style="padding: 15px;">
                        <label>Speciality:</label>
                        <select name="speciality" style="color:black;border-radius:15px;border:solid black;width:200px">
                            <option>--Select--</option>
                            <option value="Heart Doctor">Heart Doctor</option>
                            <option value="Skin Doctor">Skin Doctor</option>
                            <option value="Pediater">Pediater</option>
                            <option value="Infectioinist">Infectioinist</option>
                        </select>
                    </div>
                    <div style="padding: 15px;">
                        <label> Room number:</label>
                        <input type="number" style="color:black;border-radius:15px;border:solid black" name='roomNumber'placeholder="Please write the room number" >
                    </div>
                    <div style="padding-left: 140px;padding-top:15px ">
                        <label  >Doctor Image:</label>
                        <input  type="file"name="image" >
                    </div>
                    <div style="padding: 15px;">
                        
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
              </div>

        </div>
        <!-- partial -->
       @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
   
    <!-- End custom js for this page -->
  </body>
</html>