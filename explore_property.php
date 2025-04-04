<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Property Page</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">



  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/property.css">



  <!-- Include Font Awesome (or any icon library) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <?php include_once 'navbar-user.php'; ?>

  <div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" data-stellar-background-ratio="0.5"
      style="background-image: url('img/slide-3.jpg')">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <!-- <button class="home" onclick="location.href='index.html'" role="button"><span class="text">GO TO HOMEPAGE</span></button> -->

            <h1 class="mb-2">Our Properties</h1>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta cupiditate ipsum
              porro, deserunt iure vel aliquam, eos quaerat.</p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="realestate-filter">
    <div class="container">
      <div class="realestate-filter-wrap nav">
        <!-- <a href="#for-rent" class="active" onclick="showForm('for-rent')">For Rent</a> -->
        <a href="#for-buy" onclick="showForm('for-buy')">For Buy</a>
      </div>
    </div>
  </div>

  <div class="realestate-tabpane pb-5">
    <div class="container tab-content">
      <form method="post" action="property-list.php" id="for-buy">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Property Category:</label>
            <select name="property_category" id="" class="form-control1 w-100" required>
              <option value="">All type</option>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Division:</label>
            <select name="division" class="form-control1 w-100" required>
              <option value="dhaka">Dhaka</option>
              <option value="khulna">Khulna</option>
              <option value="rajshahi">Rajshahi</option>
              <option value="barishal">Barishal</option>
              <option value="chittagong">Chittagong</option>
              <option value="sylhet">Sylhet</option>
              <option value="dinajpur">Dinajpur</option>
              <option value="rangpur">Rangpur</option>
              <option value="mymensingh">Mymensingh</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Choose BedRooms:</label>
              <input type="number" class="form-control1 w-100" name="bedroom" placeholder="Choose  BedRooms" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="user-type">Choose BathRooms:</label>
              <input type="number" class="form-control1 w-100" name="bathroom" placeholder="Choose BathRooms" required>
            </div>
            <div class="col-md-4 form-group">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="user-type">Choose Minimum Price:</label>
                  <select name="minimum_price" id="" class="form-control1 w-100" required>
                    <option value="">Min Price</option>
                    <option value="">10000</option>
                    <option value="">20000</option>
                    <option value="">30000</option>
                    <option value="">40000</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="user-type">Choose Maximum Price:</label>
                  <select name="maximum_price" id="" class="form-control1 w-100" required>
                    <option value="">Max Price</option>
                    <option value="">25,000</option>
                    <option value="">50,000</option>
                    <option value="">75,000</option>
                    <option value="">100,000</option>
                    <option value="">100,000,000</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Enter Area(in Square/Feet):</label>
              <input type="number" class="form-control1 w-100" name="area" placeholder="Enter Area" required>
            </div>
          </div>


          <div class="row">
            <div class="center-container">
              <!-- <button class="home" onclick="location.href='index.html'" role="button"><span
                class="text">SUBMIT</span></button> -->
              <input type="submit" class="btn btn-black py-3 btn-block" role="button" name="searchProperty"
                value="Submit">
            </div>
          </div>
      </form>
    </div>
  </div>
  <!-- <div class="realestate-tabpane pb-5">
    <div class="container tab-content">
      <form method="post" action="property-grid.html" id="for-buy" style="display: none;">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Property Type:</label>
            <select name="" id="" class="form-control1 w-100" required>
              <option value="">All Type</option>
              <option value="">Resedential Type</option>
              <option value="">Commercial Type</option>
              <option value="">Both</option>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Division:</label>
            <select name="" id="" class="form-control1 w-100" required>
              <option value="">All Division</option>
              <option value="">Dhaka</option>
              <option value="">Khulna</option>
              <option value="">Rajshahi</option>
              <option value="">Barishal</option>
              <option value="">Chittagong</option>
              <option value="">Sylhet</option>
              <option value="">Dinajpur</option>
              <option value="">Rangpur</option>
              <option value="">Mymensingh</option>
            </select>

          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Enter Location:</label>
            <input type="text" class="form-control1 w-100" placeholder="Location" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Choose BedRooms:</label>
            <input type="number" class="form-control1 w-100" placeholder="Choose  BedRooms" required>
          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Choose BathRooms:</label>
            <input type="number" class="form-control1 w-100" placeholder="Choose BathRooms" required>
          </div>
          <div class="col-md-4 form-group">
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="user-type">Choose Minimum Price:</label>
                <select name="" id="" class="form-control1 w-100" required>
                  <option value="">Min Price</option>
                  <option value="">100000</option>
                  <option value="">2000000</option>
                  <option value="">3000000</option>
                  <option value="">4000000</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="user-type">Choose Maximum Price:</label>
                <select name="" id="" class="form-control1 w-100" required>
                  <option value="">Max Price</option>
                  <option value="">25,00000</option>
                  <option value="">50,00000</option>
                  <option value="">75,00000</option>
                  <option value="">100,00000</option>
                  <option value="">100,00000,000</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Enter Area:</label>
            <input type="number" class="form-control1 w-100" placeholder="Enter Area" required>
          </div>
        </div>
        <div class="row">
          <div class="center-container"> -->

  <!-- <input type="submit" class="btn btn-black py-3 btn-block" role="button" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div> -->


  <!-- <div class="realestate-tabpane pb-5">
    <div class="container tab-content">
      <form method="post" id="for-buy" style="display: none;">
        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Property Type:</label>
            <select name="" id="" class="form-control1 w-100" required>
              <option value="">All Type</option>
              <option value="">Resedential Type</option>
              <option value="">Commercial Type</option>
              <option value="">Both</option>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Choose Division:</label>
            <select name="" id="" class="form-control1 w-100" required>
              <option value="">All Division</option>
              <option value="">Dhaka</option>
              <option value="">Khulna</option>
              <option value="">Rajshahi</option>
              <option value="">Barishal</option>
              <option value="">Chittagong</option>
              <option value="">Sylhet</option>
              <option value="">Dinajpur</option>
              <option value="">Rangpur</option>
              <option value="">Mymensingh</option>
            </select>

          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Enter Address:</label>
            <input type="text" class="form-control1 w-100" placeholder="Address" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 form-group">
            <label for="user-type">Choose BedRooms:</label>
            <input type="number" class="form-control1 w-100" placeholder="Choose  BedRooms" required>
          </div>
          <div class="col-md-4 form-group">
            <label for="user-type">Choose BathRooms:</label>
            <input type="number" class="form-control1 w-100" placeholder="Choose BathRooms" required>
          </div>
          <div class="col-md-4 form-group">
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="user-type">Choose Minimum Price:</label>
                <select name="" id="" class="form-control1 w-100" required>
                  <option value="">Min Price</option>
                  <option value="">1000000</option>
                  <option value="">2000000</option>
                  <option value="">3000000</option>
                  <option value="">4000000</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="user-type">Choose Maximum Price:</label>
                <select name="" id="" class="form-control1 w-100" required>
                  <option value="">Max Price</option>
                  <option value="">25,00000</option>
                  <option value="">50,00000</option>
                  <option value="">75,00000</option>
                  <option value="">100,00000</option>
                  <option value="">100,000,000</option>
                </select>
              </div>
            </div>
           
      </form>
    </div>
  </div> -->
  <!-- <div class="row">
    <div class="center-container">
      <button class="home" onclick="location.href='index.html'" role="button"><span class="text">SUBMIT</span></button>
    </div>
  </div> -->
  <footer>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">Get In Touch</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">Quick Links</h5>
            <a class="btn btn-link text-white-50" href="">About Us</a>
            <a class="btn btn-link text-white-50" href="">Contact Us</a>
            <a class="btn btn-link text-white-50" href="">Our Services</a>
            <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
            <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">Photo Gallery</h5>
            <div class="row g-2 pt-2">
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">Newsletter</h5>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px;">
              <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
              <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Property Go</a>, All Right Reserved.

              Designed By <a class="border-bottom" href="https://htmlcodex.com">Tasnuba Tasnim</a>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <div class="footer-menu">
                <a href="">Home</a>
                <a href="">Cookies</a>
                <a href="">Help</a>
                <a href="">FQAs</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

  </footer>




  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/service.js"></script>
</body>
<script>
  function showForm(formId) {
    // Hide both forms initially
    document.getElementById('for-rent').style.display = 'none';
    document.getElementById('for-buy').style.display = 'none';

    // Show the selected form
    document.getElementById(formId).style.display = 'block';

    // Update active class for tabs
    document.querySelector('.realestate-filter-wrap a.active').classList.remove('active');
    document.querySelector(`[href="#${formId}"]`).classList.add('active');
  }

  // Ensure 'For Rent' form is shown by default on page load
  document.addEventListener('DOMContentLoaded', () => {
    showForm('for-rent');
  });
</script>

</html>