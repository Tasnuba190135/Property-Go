<?php
include_once 'php-class-file/SessionManager.php';
include_once 'php-class-file/Property.php';

if (isset($_POST['searchProperty'])) {
  // Capture the form data
  $propertyCategory = isset($_POST['property_category']) ? $_POST['property_category'] : null;
  $division = isset($_POST['division']) ? $_POST['division'] : null;
  $bedroom = isset($_POST['bedroom']) ? $_POST['bedroom'] : null;
  $bathroom = isset($_POST['bathroom']) ? $_POST['bathroom'] : null;
  $minPrice = isset($_POST['minimum_price']) ? $_POST['minimum_price'] : null;
  $maxPrice = isset($_POST['maximum_price']) ? $_POST['maximum_price'] : null;
  $area = isset($_POST['area']) ? $_POST['area'] : null;

  $filteredProperties = $propertyDetails->getFilteredProperties($propertyCategory, $division, $bedroom, $bathroom, $minPrice, $maxPrice, $area);
}

$property = new Property();
$propertyLists = $property->getByPropertyIdAndStatus(null, 1, 'DESC');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG v3</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/property.css">
  <!-- <link rel="stylesheet" href="login.css"> -->
  <!-- <link rel="stylesheet" href="css/agents.css"> -->


  <!-- Include Font Awesome (or any icon library) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
  <?php include_once 'navbar-user.php'; ?>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Properties</h1>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->

  <?php if ($propertyLists === false) { ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>No properties found.</h2>
        </div>
      </div>
    </div>
  <?php } else { ?>

    <!-- filter start -->
    <div class="property-filter">
      <div class="container">
        <div class="row">
          <!-- Min Price Input -->
          <div class="col-md-3">
            <label for="min-price">Min Price:</label>
            <input type="number" id="min-price" class="form-control" placeholder="Min Price" min="0">
          </div>

          <!-- Max Price Input -->
          <div class="col-md-3">
            <label for="max-price">Max Price:</label>
            <input type="number" id="max-price" class="form-control" placeholder="Max Price" min="0">
          </div>

          <!-- Property Category Dropdown -->
          <div class="col-md-3">
            <label for="property-category">Property Category:</label>
            <select id="property-category" class="form-control">
              <option value="">Select Category</option>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
              <option value="both">Both</option>
            </select>
          </div>

          <!-- Division Dropdown -->
          <div class="col-md-3">
            <label for="division">Division:</label>
            <select id="division" class="form-control">
              <option value="">Select Division</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Khulna">Khulna</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Chittagong">Chittagong</option>
            </select>
          </div>

          <!-- Bedroom Input -->
          <div class="col-md-3">
            <label for="bedroom">Bedrooms:</label>
            <input type="number" id="bedroom" class="form-control" placeholder="Number of Bedrooms" min="1">
          </div>
        </div>

        <div class="row">
          <!-- Bathroom Input -->
          <div class="col-md-3">
            <label for="bathroom">Bathrooms:</label>
            <input type="number" id="bathroom" class="form-control" placeholder="Number of Bathrooms" min="1">
          </div>

          <!-- Area Input (sq ft) -->
          <div class="col-md-3">
            <label for="area">Area (sq feet):</label>
            <input type="number" id="area" class="form-control" placeholder="Area in Sq Ft" min="1">
          </div>

          <div class="col-md-3">
            <button id="apply-filters" class="btn btn-primary" style="margin-top: 30px;">Apply Filters</button>
          </div>
        </div>
      </div>
    </div>
    <!-- filter end -->


    <section class="intro-single property-grid grid">

      <div class="container">
        <div class="row">
          <?php
          foreach ($propertyLists as $prop) {
            $singleProperty = new Property();
            $singleProperty->setProperties($prop);
          ?>
            <!-- card start -->
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="img/property-3.jpg" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <p><?php echo $singleProperty->property_title; ?></p>
                        </p>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">Price | <?php echo $singleProperty->price; ?>BDT </span>
                      </div>
                      <a href="property-single.php?propertyId=<?php echo $singleProperty->property_id; ?>" class="link-a">Click here to view
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span><?php echo $singleProperty->area; ?>m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span><?php echo $singleProperty->bedroom_no; ?></span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span><?php echo $singleProperty->bathroom_no; ?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- card end -->
          <?php } ?>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item previous">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item" data-page="1"><a class="page-link" href="#">1</a></li>
                <li class="page-item" data-page="2"><a class="page-link" href="#">2</a></li>
                <li class="page-item" data-page="3"><a class="page-link" href="#">3</a></li>
                <li class="page-item next">
                  <a class="page-link" href="#" aria-label="Next">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
    </section>
  <?php } ?>
  <!--/ Property Grid End /-->


  <footer>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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

</html>