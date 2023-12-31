<div class="page-section pb-0" id="aboutUs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <h1>Welcome to Your Health <br> Center</h1>
          <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
          <a href="about.html" class="btn btn-primary">Learn More</a>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
          <div class="img-place custom-img-1">
            <img src="../assets/img/bg-doctor.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section" id="doctor">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

    <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @foreach ($doctor as $doctors)
          
      <div class="item">
        <div class="card-doctor">
          <div class="header">
            <img height="300px" src="doctorImage/{{$doctors->image}}" alt="">
            <div class="meta">
              <a href="#"><span class="mai-call"></span></a>
              <a href="#"><span class="mai-logo-whatsapp"></span></a>
            </div>
          </div>
          <div class="body">
            <p class="text-xl mb-0">{{$doctors->name}}</p>
            <span class="text-sm text-grey">{{$doctors->speciality}}</span>
          </div>
        </div>
      </div>
      
      @endforeach
      
      
     
    </div>
  </div>
</div>