<?php
include_once 'php-class-file/SessionManager.php';
$session =  SessionStatic::class;

if (isset($_GET['logoutMsg']) && $_GET['logoutMsg'] == 2) {
  include_once 'pop-up.php';
  showPopup('Logged out successfully!');
  unset($_GET['logout']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
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
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/agents.css">

  <!-- Include Font Awesome (or any icon library) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

  <?php include_once 'navbar-user.php'; ?>

  <!--/ Carousel Start /-->
  <section>
    <div class="intro intro-carousel">
      <div id="carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-1.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <!-- <p class="intro-title-top">Doral, Florida
                      <br> 78345</p> -->
                      <h1 class="intro-title mb-4"> Find Your
                        <br><span class="color-b">Perfect
                          Home</span><br>With Us
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="property-list.php" class=" btn btn-light btn-bg btn-slide hover-slide-right mt-4">
                          <span>Explore Now</span>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-2.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <!-- <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Rino
                      <br> Venda Road Five</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p> -->
                      <h1 class="intro-title mb-4"> Find Your
                        <br><span class="color-b">Perfect
                          Home</span><br>With Us
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="property-list.php" class=" btn btn-light btn-bg btn-slide hover-slide-right mt-4">
                          <span>Explore Now</span>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/slide-3.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <!-- <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Alira
                      <br> Roan Road One</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p> -->
                      <h1 class="intro-title mb-4"> Find Your
                        <br><span class="color-b">Perfect
                          Home</span><br>With Us
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="property-list.php" class=" btn btn-light btn-bg btn-slide hover-slide-right mt-4">
                          <span>Explore Now</span>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Carousel end /-->

  <section class="our-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading-wrapper">
            <h2 class="section-title">We have the service you need</h2>
            <p class="section-subtitle">We are a team of real estate professionals dedicated to helping you find your
              dream property. Our services include:</p>
          </div>
        </div>
      </div>
      <div class="service-content-cards-wrapper">
        <div class="service-card-wrapper">
          <div class="service-icon">
            <i class="fas fa-home"></i>
          </div>
          <h3>Sell Your Home</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, ipsum.</p>
        </div>

        <div class="service-card-wrapper">
          <div class="service-icon">
            <i class="fas fa-home"></i>
          </div>
          <h3>Buy a Home</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, ipsum.</p>
        </div>

        <div class="service-card-wrapper">
          <div class="service-icon">
            <i class="fa fa-street-view"></i>
          </div>
          <h3>Matching Buyer</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, ipsum.</p>
        </div>

        <div class="service-card-wrapper">
          <div class="service-icon">
            <i class="fa fa-heart"></i>
          </div>
          <h3>Need Help?</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, ipsum.</p>
        </div>

      </div>
    </div>
  </section>

  <!--/ Agents Start /-->
  <section class="section-agents section-t8 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest Properties</h2>
            </div>
            <div class="title-link">
              <a href="latest-property.php">All Properties
                <span class="fa fa-arrow-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card-box-d">
            <div class="property-service-img-wrap">
              <img src="img/property-2.jpg" alt="" class="img-d img-fluid">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-box property-service">
            <h2 class="title property-service-title">Find Your Dream Property</h2>
            <p class="property-service-description">
              Explore a wide range of residential and commercial properties tailored to your needs. Whether you're
              searching for a cozy family home, a lucrative investment opportunity, or the perfect business space, we
              have a diverse collection to choose from.
            </p>
            <ul class="property-benefits-lists">
              <li>✅ Verified Property Listings</li>
              <li>✅ Affordable Prices & Flexible Payment Options</li>
              <li>✅ Easy & Secure Transactions</li>
              <li>✅ Trusted by Thousands of Customers</li>
              <li>✅ 24/7 Customer Support for Assistance</li>
              <li>✅ Detailed Property Insights & Virtual Tours</li>
              <li>✅ Direct Communication with Property Owners</li>
              <li>✅ Personalized Recommendations Based on Your Preferences</li>
            </ul>

            <p class="intro-subtitle intro-price">
            <div class=" mt-3">
              <a href="latest-property.php" class="btn btn-light btn-bg btn-slide hover-slide-right mt-4 "
                style="text-align: center;">
                <span>Explore Now</span>
              </a>
            </div>
            </p>

          </div>
        </div>
      </div>
    </div>
    <!-- <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">View Details</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  23/7 Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> abc@example.com</p>
                </div>
              </div>
            </div> -->
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  <!--/ Agents End /-->

  <section class="find-best-place">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="find-best-place-left">
            <h2>Find Best Place For Living </h2>
            <p>Spend vacations in best hotels and resorts find the great place of your
              choice using different searching options.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div>
            <a href="contact.php" class="btn btn-light btn-bg btn-slide hover-slide-right mt-4 "
              style="text-align: center;">
              <span>Contact Us</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <footer>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5  wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h5 class="footer-col-title mb-4">Get In Touch</h5>
            <div class="footer-info-wrap">
              <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
              <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
              <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="footer-col-title mb-4">Quick Links</h5>
            <div class="footer-col-link-wrap">
              <a class="btn btn-link text-white-50" href="">About Us</a>
              <a class="btn btn-link text-white-50" href="">Contact Us</a>
              <a class="btn btn-link text-white-50" href="">Our Services</a>
              <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
              <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="footer-col-title mb-4">Photo Gallery</h5>
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
            <h5 class="footer-col-title mb-4">Newsletter</h5>
            <p class="newsletter-sub-text">Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
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

</html>