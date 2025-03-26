<?php
include_once 'php-class-file/SessionManager.php';
include_once 'php-class-file/Property.php';

// 1. Get all properties by division (status=1)
$property = new Property();
$divisionWisePropertyLists = $property->getRecentRowsForEachDivision(1, 'posted', 'DESC', 5);

// 2. If there are no properties, just show a "no properties found" message below
if (empty($divisionWisePropertyLists)) {
    $divisionNames = [];
} else {
    $divisionNames = array_keys($divisionWisePropertyLists);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recent 5 Properties Division Wise</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">
  <!-- Fonts & CSS -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/property.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Simple Transparent Button Style for Sub Navigation */
    .btn-glossy {
      background: transparent;
      border: 2px solid transparent;
      color: #333;
      padding: 10px 20px;
      border-radius: 8px;
      transition: all 0.3s ease;
      margin: 5px;
      cursor: pointer;
      font-size: 1rem;
    }
    .btn-glossy:hover {
      border-color: #6fb1fc;
    }
    /* Active button with glowing border */
    .btn-active {
      border-color: #6fb1fc;
      box-shadow: 0 0 8px 2px rgba(107, 177, 252, 0.6);
    }
    /* Style for no property message */
    .no-property {
      text-align: center;
      margin-top: 40px;
      font-size: 1.5rem;
      color: #666;
    }
  </style>
</head>
<body>
  <?php include_once 'navbar-user.php'; ?>

  <!-- Intro Section -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Recent 5 Properties Division Wise</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Division Buttons as Sub Navigation -->
  <?php if ($divisionWisePropertyLists) { ?>
  <div class="container mt-4">
    <div class="d-flex justify-content-center flex-wrap">
      <?php
      foreach (array_keys($divisionWisePropertyLists) as $divisionName) {
          echo '<button type="button" class="btn-glossy division-btn" data-division="' . htmlspecialchars($divisionName) . '">'
               . htmlspecialchars($divisionName) . '</button>';
      }
      ?>
    </div>
  </div>
  <?php } ?>

  <!-- Properties Section: Group properties by division -->
  <div class="container mt-4" id="properties-container">
    <?php
    // If no properties found in any division, show a nice message and trigger a popup
    if (!$divisionWisePropertyLists) {
      include_once 'pop-up.php';
      showPopup('No property found.');
      echo '<div class="no-property">No property found.</div>';
    } else {
      foreach ($divisionWisePropertyLists as $divisionName => $properties) {
      ?>
          <div class="division-cards" data-division="<?php echo htmlspecialchars($divisionName); ?>">
            <h2><?php echo htmlspecialchars($divisionName); ?></h2>
            <div class="row">
              <?php foreach ($properties as $propArray) {
                      $singleProperty = new Property();
                      $singleProperty->setProperties($propArray);
              ?>
                <div class="col-md-4 mb-4">
                  <div class="card card-shadow">
                    <!-- Example image -->
                    <img class="card-img-top" src="img/property-3.jpg" alt="Property">
                    <div class="card-body">
                      <h5 class="card-title">
                        <?php echo htmlspecialchars($singleProperty->property_title); ?>
                      </h5>
                      <p class="card-text">
                        Price: <?php echo $singleProperty->price; ?> BDT<br>
                        Area: <?php echo $singleProperty->area; ?> m<sup>2</sup><br>
                        Beds: <?php echo $singleProperty->bedroom_no; ?><br>
                        Baths: <?php echo $singleProperty->bathroom_no; ?>
                      </p>
                      <a href="property-single.php?propertyId=<?php echo $singleProperty->property_id; ?>"
                         class="btn btn-primary" target="_blank">
                         View Details
                      </a>
                    </div>
                  </div>
                </div>
              <?php } // End property loop ?>
            </div>
          </div>
    <?php } // End division loop
    } ?>
  </div>

  <footer class="footer mt-5">
    <div class="container">
      <p>Footer content here</p>
    </div>
  </footer>

  <!-- JS Libraries -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>
  <script src="js/service.js"></script>

  <!-- JavaScript to Filter Division Cards -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var buttons = document.querySelectorAll('.division-btn');
      var divisionCards = document.querySelectorAll('.division-cards');

      // Initially, show only the first division's cards and mark its button as active
      if (divisionCards.length > 0) {
        divisionCards.forEach(function(card, index) {
          card.style.display = (index === 0) ? 'block' : 'none';
        });
        buttons.forEach(function(btn, index) {
          if(index === 0) {
            btn.classList.add('btn-active');
          }
        });
      }

      // Add click event listeners to each division button
      buttons.forEach(function(button) {
        button.addEventListener('click', function() {
          var selectedDivision = button.getAttribute('data-division');

          // Update active button styling
          buttons.forEach(function(btn) {
            btn.classList.remove('btn-active');
          });
          button.classList.add('btn-active');

          // Hide all division cards and then show the selected one
          divisionCards.forEach(function(card) {
            card.style.display = (card.getAttribute('data-division') === selectedDivision) ? 'block' : 'none';
          });
        });
      });
    });
  </script>
</body>
</html>
