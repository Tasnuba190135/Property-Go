<?php
// Include necessary PHP class files (adjust paths as needed)
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/FileManager.php';

// $session = new SessionManager();

$property = new Property();

$imageFiles;
$videoFile;

if (isset($_GET['propertyId'])) {
  $property->property_id = $_GET['propertyId'];
  $property->getByPropertyIdAndStatus($property->property_id);

  $imageFiles = explode(',', $property->property_image_file_ids);
  $videoFile = $property->property_video_file_ids;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Property Details Check Page</title>
  <link href="img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/property.css">


  <style>
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 500px;
    }

    .swiper-slide img {
      display: block;
      width: auto;
      height: 80%;
      object-fit: cover;
    }
  </style>



</head>

<body>
  <h1 style="text-align: center; padding: 30px 0;">Property Review in detail</h1>

  <!--/ Intro Single star /-->
  <section class="intro-single1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $property->property_title; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <section class="swiper-section mb-5">
    <div class="container">
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <?php
          for ($i = 0; $i < count($imageFiles); $i++) {
            $fileTemp = new FileManager();
            $fileTemp->setValueById($imageFiles[$i]);
          ?>
            <div class="swiper-slide">
              <img src="../file/<?php echo $fileTemp->file_new_name; ?>" alt="">
            </div>
          <?php } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money"><?php echo $property->user_id; ?> </span>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Property ID:</strong>
                      <span><?php echo $property->property_id; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Property Type:</strong>
                      <span><?php echo $property->property_category; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Location:</strong>
                      <span><?php echo $property->address; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>BedRooms:</strong>
                      <span><?php echo $property->bedroom_no; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>BathRooms:</strong>
                      <span><?php echo $property->bathroom_no; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Price:</strong>
                      <span><?php echo $property->price; ?> Lakh</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span><?php echo $property->area; ?> m²</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Property Description</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  <?php echo $property->description; ?>
                </p>
              </div>
            </div>
          </div>

        </div>

        <!-- Video -->
        <div class="col-md-12 my-5 ">
          <div class="d-flex align-items-center justify-content-center">
            <?php if ($videoFile) { 
              $videoTemp = new FileManager();
              $videoTemp->setValueById($videoFile);
              ?>
              <!-- TODO: Add video player here -->
              <video width="720" height="480" controls>
                <source src="../file/<?php echo $videoTemp->file_new_name; ?>" type="video/mp4">
                Your browser does not support the video tag.
            <?php } ?>
          </div>
        </div>

      </div>
      <!-- <a href="property-review.php" class="btn btn-light btn-bg btn-slide hover-slide-right mt-4 btn-explore">
        <span>Back To Property Review</span>
      </a> -->
    </div>
  </section>

  <!-- Footer -->

  <!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="../js/main.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<script src="js/service.js"></script>
</body>

</html>