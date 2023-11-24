  <!-- Footer Start -->
  <div class="container-fluid footer position-relative bg-dark text-white-50 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5 ">
            <div class="col-lg-6 pe-lg-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="h1 text-primary mb-0">JO<span class="text-white">ROVER</span></h1>
                </a>
                <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor.</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-2"></i>info@example.com</p>
   
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href={{ route("home") }}>Home</a>
                        <a class="btn btn-link" href="">Jo Rover</a>
                        <a class="btn btn-link" href={{ route("events") }}>Events</a>
                        <a class="btn btn-link" href={{ route("team") }}>Team</a>
                        <a class="btn btn-link" href={{ route("roadmap") }}>Road Map</a>
                    </div>
                    
             
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark text-white-50 py-4">
    <div class="container">
        <center >
          
                <p class="mb-0"><a href="#">Powered by Coding Academy by Orange | Irbid</a> &copy; 2023 All Rights Reserved.</p>
            
        </center>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("lib/wow/wow.min.js")}}"></script>
<script src="{{asset("lib/easing/easing.min.js")}}"></script>
<script src="{{asset("lib/waypoints/waypoints.min.js")}}"></script>
<script src="{{asset("lib/counterup/counterup.min.js")}}"></script>
<script src="{{asset("lib/owlcarousel/owl.carousel.min.js")}}"></script>

<!-- Template Javascript -->
<script src="{{asset("js/main.js")}}"></script>
</body>

</html>
