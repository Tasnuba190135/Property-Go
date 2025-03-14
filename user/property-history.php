<?php
// Include necessary PHP class files from the root/php-class-file/ directory
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/PropertyDetails.php';

// Start session and get session user object
$session = new SessionManager();
$sUser = $session->getObject("user");

// If the user is not logged in, display a message and exit.
if (!$sUser) {
  echo "<p>You must be logged in to view your property history.</p>";
  exit;
}

// Create a new User object from the session object and set its user_id
$user = new User();
$user->user_id = $sUser->user_id;
$user->setValue();
// Instantiate Property class and retrieve all properties for this user.
// We assume a function in Property class like getRowsByUserIdAndStatus($userId, $status=null)
$property = new Property();
$properties = $property->getRowsByUserIdAndStatus($user->user_id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Property History</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
  <?php include_once 'sidebar-user.php'; ?>

  <div id="main-content" class="main-content">
    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
      <h5>Property History</h5>
      <!-- Toggle Button -->
      <button class="toggle-btn d-md-none" id="toggle-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Content -->
    <div class="container mt-5">
      <!-- For Sale Section -->
      <section class="mb-5">
        <div class="container mt-4">
          <div class="card__wrapper">
            <div class="card__title-wrap mb-20">
              <h2 class="mb-4 text-center">Type: For Sale by me</h2>
              <hr class="mb-4">
            </div>
            <div class="row">
              <?php
              if (!empty($properties)) {
                foreach ($properties as $prop) {
                  // Load property details for the current property_id
                  $propertyDetails = new PropertyDetails();
                  $propertyDetails->setValueByPropertyId($prop['property_id']);

                  // Assume property title is stored in propertyDetails->property_title; 
                  // if not available, fallback to property type.
                  $title = isset($propertyDetails->property_title) ? $propertyDetails->property_title : $prop['property_type'];

                  // Determine status text: 0 = Pending, 1 = Live on Site.
                  $statusText = ($prop['status'] == 0) ? "Pending" : (($prop['status'] == 1) ? "Live on Site" : "Unknown");
              ?>
                  <div class="col-md-4 mb-4">
                    <div class="card card-sale">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <p><strong>ID:</strong> <?php echo $prop['property_id']; ?></p>
                        <p><strong>Status:</strong> <?php echo $statusText; ?></p>
                        <p><strong>Type:</strong> <?php echo $prop['property_type'] ?></p>
                        <div class="d-flex justify-content-between mt-3">
                          <a href="../property-single.php?propertyId=<?php echo $propertyDetails->property_id; ?>" class="btn btn-info btn-sm">View</a>
                          <a href="edit-property.php?propertyId=<?php echo $propertyDetails->property_id; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                }
              } else {
                echo "<p>No properties found.</p>";
              }
              ?>
            </div>


          </div>
        </div>
      </section>
    </div>
  </div>

  <!-- JavaScript for Sidebar Toggle -->
  <script>
    const toggleBtn = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar");
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>