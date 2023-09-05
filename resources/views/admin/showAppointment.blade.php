
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   <style>
     
  
   
   th{
    padding:10px;

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
         <div align="center" style="padding-top:100px;">
            <table >
                <tr style="background-color: black;"align="center" >
                    <th >Costumer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Date </th>
                    <th>Message</th>
                    <th>status</th>
                    <th>Approved</th>
                    <th>Canceled</th>
                </tr>
                @foreach ($data as $appoint)
                    
                <tr align="center" style="background-color: white;border:1px solid black;">
                    <td style="color:black">{{$appoint->name}}</td>
                    <td style="color:black">{{$appoint->email}}</td>
                    <td style="color:black">{{$appoint->phone}}</td>
                    <td style="color:black">{{$appoint->doctor}}</td>
                    <td style="color:black">{{$appoint->date}}</td>
                    <td style="color:black">{{$appoint->message}}</td>
                    <td style="color:black">{{$appoint->status}}</td>
                    <td><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a></td>
                    <td><a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a></td>
                </tr>
                @endforeach
            </table>
         </div>
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
            
                
              </div>

        </div>
        <!-- partial -->
       @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
   
    <!-- End custom js for this page -->
  </body>
</html>