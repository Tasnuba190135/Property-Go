<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG v3</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <!-- <link rel="shortcut icon" href="favicon.png" /> -->



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
            <h1 class="title-single">We Give Great Service For Rent, Sell or Buy Property</h1>
            <span class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus officia
              corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui
              ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore hic culpa.Aut
              natus officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae
              possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore
              hic culpa</span>

          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                About
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->
  <!--/ About Star /-->
  <section class="section-about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-img-box">
            <img src="img/image_about.jpg" alt="" class="img-fluid">
          </div>
          <!-- <div class="sinse-box">
            <h3 class="sinse-title">Property Go
              <span></span>
              <br> Since 2017</h3>
            <p>Art & Creative</p>
          </div> -->
        </div>
      </div>
    </div>
  </section>
  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Buy Section -->
        <div class="col-md-6">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Buy</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta.ligula sed magna dictum porta
              </p>
              <p class="more-content" id="buyContent">
                Here is the extra content for the Buy section. You can add more details here!
              </p>
            </div>
            <div class="card-footer-c">
              <span class="link-c" id="readMoreBuy" onclick="toggleContent('buyContent', 'readMoreBuy')">Read more <span class="fa fa-arrow-right"></span></span>
            </div>
          </div>
        </div>

        <!-- Sell Section -->
        <!-- <div class="col-md-6">
    <div class="card-box-c foo">
      <div class="card-header-c d-flex">
        <div class="card-box-ico">
          <span class="fa fa-home"></span>
        </div>
        <div class="card-title-c align-self-center">
          <h2 class="title-c">Sell</h2>
        </div>
      </div>
      <div class="card-body-c">
        <p class="content-c">
          Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta.ligula sed magna dictum porta
        </p>
        <p class="more-content" id="sellContent">
          Here is the extra content for the Sell section. Add more details here!
        </p>
      </div>
      <div class="card-footer-c">
        <span class="link-c" id="readMoreSell" onclick="toggleContent('sellContent', 'readMoreSell')">Read more <span class="fa fa-arrow-right"></span></span>
      </div>
    </div>
  </div> -->

        <!-- Rent Section -->
        <div class="col-md-6">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Sell</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta.ligula sed magna dictum porta
              </p>
              <p class="more-content" id="rentContent">
                Here is the extra content for the Sell section. Add more details here!
              </p>
            </div>
            <div class="card-footer-c">
              <span class="link-c" id="readMoreSell" onclick="toggleContent('rentContent', 'readMoreRent')">Read more <span class="fa fa-arrow-right"></span></span>

            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>


  <!--/ Services End /-->

  <!-- About Section -->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-6"> <img src="img/about4.jpg" class="img-responsive" alt=""> </div>
        <div class="col-xs-12 col-md-6">
          <div class="about-text">
            <h2>Who We Are</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
            <h3>Why Choose Us?</h3>
            <div class="list-style">
              <div class="col-lg-6 col-sm-6 col-xs-12">
                <ul>
                  <li>Years of Experience</li>
                  <li>Fully Insured</li>
                  <li>Cost Control Experts</li>
                  <li>100% Satisfaction Guarantee</li>
                </ul>
              </div>
              <div class="col-lg-6 col-sm-6 col-xs-12">
                <ul>
                  <li>Free Consultation</li>
                  <li>Satisfied Customers</li>
                  <li>Project Management</li>
                  <li>Affordable Pricing</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="section pt-0">
        <div class="container">
          <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
              <div class="img-about dots">
                <img src="img/hero_bg_3.jpg" alt="Image" class="img-fluid" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-home2"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Quality properties</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
  
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-person"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Top rated agents</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
  
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-security"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Easy and safe</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="section pt-0">
        <div class="container">
          <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0">
              <div class="img-about dots">
                <img src="img/hero_bg_2.jpg" alt="Image" class="img-fluid" />
              </div>
            </div>
            <div class="col-lg-4">
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-home2"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Quality properties</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
  
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-person"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Top rated agents</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
  
              <div class="d-flex feature-h">
                <span class="wrap-icon me-3">
                  <span class="icon-security"></span>
                </span>
                <div class="feature-text">
                  <h3 class="heading">Easy and safe</h3>
                  <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nostrum iste.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
              <img src="img/img_2.jpg" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4 mt-lg-5" data-aos="fade-up" data-aos-delay="100">
              <img src="img/img_3.jpg" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <img src="img/img_2.jpg" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="row section-counter mt-5">
            <div
              class="col-6 col-sm-6 col-md-6 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="counter-wrap mb-5 mb-lg-0">
                <span class="number"
                  ><span class="countup text-primary">2917</span></span
                >
                <span class="caption text-black-50"># of Buy Properties</span>
              </div>
            </div>
            <div
              class="col-6 col-sm-6 col-md-6 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="counter-wrap mb-5 mb-lg-0">
                <span class="number"
                  ><span class="countup text-primary">3918</span></span
                >
                <span class="caption text-black-50"># of Sell Properties</span>
              </div>
            </div>
            <div
              class="col-6 col-sm-6 col-md-6 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <div class="counter-wrap mb-5 mb-lg-0">
                <span class="number"
                  ><span class="countup text-primary">38928</span></span
                >
                <span class="caption text-black-50"># of All Properties</span>
              </div>
            </div>
            <div
              class="col-6 col-sm-6 col-md-6 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="counter-wrap mb-5 mb-lg-0">
                <span class="number"
                  ><span class="countup text-primary">1291</span></span
                >
                <span class="caption text-black-50"># of Agents</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->

  <!-- Footer Start -->
  <footer>
    <div class="container-fluid bg-dark text-white-50 footer pt-5  wow fadeIn" data-wow-delay="0.1s">
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Property Go</a>, All Right Reserved.
              Designed By <a class="border-bottom" href="https://htmlcodex.com">Tasnuba Tasnim</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

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