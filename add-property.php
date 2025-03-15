<?php
// Include necessary PHP class files
include_once 'php-class-file/SessionManager.php';
include_once 'php-class-file/User.php';
include_once 'php-class-file/Property.php';
include_once 'php-class-file/PropertyDetails.php';
include_once 'php-class-file/FileManager.php';

$session = new SessionManager();

// Retrieve user session object
$sUser = $session->getObject("user");

// Create a new User object and set its user_id from the session
$user = new User();
if ($sUser) {
  $user->user_id = $sUser->user_id;
  $user->setValue();
} else {
  // If not logged in, set a session message
  $session->set('msg1', 'You need to login to add a property.');
}

// Helper function to re-array the $_FILES array for multiple uploads
function reArrayFiles($filePost)
{
  $fileArr = [];
  $fileCount = count($filePost['name']);
  $fileKeys  = array_keys($filePost);

  for ($i = 0; $i < $fileCount; $i++) {
    foreach ($fileKeys as $key) {
      $fileArr[$i][$key] = $filePost[$key][$i];
    }
  }
  return $fileArr;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  if ($sUser) {
    // Retrieve form inputs
    $propertyTitle       = $_POST['property-title'];
    $propertyCategory    = $_POST['property_category'];
    $division            = $_POST['division'];
    $location            = $_POST['location'];
    $bedroom             = $_POST['bedroom'];
    $bathroom            = $_POST['bathroom'];
    $price               = $_POST['price'];
    $area                = $_POST['area'];
    $propertyDescription = $_POST['property-description'];

    // Handle file uploads for multiple images and a single video
    $imageFilesOriginal = $_FILES['upload-image'];
    $videoFile          = $_FILES['upload-video'];

    // Normalize the image files array
    $imageFiles = reArrayFiles($imageFilesOriginal);
    $imageFileIds = [];

    foreach ($imageFiles as $file) {
      if ($file['error'] === 0) {
        $fileManager = new FileManager();
        $fileManager->file_owner_id = $user->user_id;
        $fileManager->insert();
        $fileManager->doOp($file); // Process the full file object
        $fileManager->update();
        $imageFileIds[] = $fileManager->file_id;
      }
    }

    // Process video file (assume single video)
    $videoFileId = null;
    if ($videoFile['error'] === 0) {
      $fileManager = new FileManager();
      $fileManager->file_owner_id = $user->user_id;
      $fileManager->insert();
      $fileManager->doOp($videoFile); // Pass the full video file object
      $fileManager->update();
      $videoFileId = $fileManager->file_id;
    }

    // Insert property record
    $property = new Property();
    $property->user_id = $user->user_id;
    $property->status = 0;
    $property->property_type = $propertyCategory;

    $insertedPropertyId = $property->insert();

    if ($insertedPropertyId) {
      // Insert property details record
      $propertyDetails = new PropertyDetails();
      $propertyDetails->property_title = $propertyTitle;
      $propertyDetails->property_id = $insertedPropertyId;
      $propertyDetails->property_category = $propertyCategory;
      $propertyDetails->division = $division;
      $propertyDetails->address = $location;
      $propertyDetails->bedroom_no = $bedroom;
      $propertyDetails->bathroom_no = $bathroom;
      $propertyDetails->price = $price;
      $propertyDetails->area = $area;
      $propertyDetails->description = $propertyDescription;

      $propertyDetails->property_image_file_ids = implode(',', $imageFileIds);
      // [1,2,3] -> "1,2,3"
      // ans = explode(',',$propertyDetails->property_image_file_ids );
      $propertyDetails->property_video_file_ids = $videoFileId;

      $propertyDetails->insert();

      $session->set('msg1', 'Property added successfully.');
      header('Location: add-property.php');
      exit();
    } else {
      $session->set('msg1', 'Failed to add property.');
    }
  } else {
    $session->set('msg1', 'Please log in to add a property.');
  }
}
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
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
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
  <!-- Include Font Awesome -->
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
            <h1 class="mb-2">Our Properties</h1>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta cupiditate ipsum
              porro, deserunt iure vel aliquam, eos quaerat.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Display session message if it exists -->
  <?php
  if ($session->get('msg1')) {
    echo "<div class='alert alert-info'>{$session->get('msg1')}</div>";
    $session->delete('msg1');
  }
  ?>

  <!-- Only show form if the user is logged in -->
  <?php if ($sUser): ?>
    <div class="realestate-filter">
      <div class="container">
        <div class="realestate-filter-wrap nav">
          <a href="#for-sale" onclick="showForm('for-sale')">For Sale</a>
        </div>
      </div>
    </div>

    <div class="realestate-tabpane pb-5">
      <div class="container tab-content">
        <form method="post" enctype="multipart/form-data" action="" id="for-sale">
          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Property title:</label>
              <input type="text" class="form-control1 w-100" name="property-title" placeholder="Titile" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Choose Property Category:</label>
              <select name="property_category" class="form-control1 w-100" required>
                <option value="residential">Residential</option>
                <option value="commercial">Commercial</option>
                <option value="both">Both</option>
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
            <div class="col-md-4 form-group">
              <label for="user-type">Enter Address:</label>
              <input type="text" class="form-control1 w-100" name="location" placeholder="Address" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Choose Bedrooms:</label>
              <input type="number" class="form-control1 w-100" name="bedroom" placeholder="Choose Bedrooms" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="user-type">Choose Bathrooms:</label>
              <input type="number" class="form-control1 w-100" name="bathroom" placeholder="Choose Bathrooms" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="user-type">Enter Price:</label>
              <input type="number" name="price" class="form-control1 w-100" placeholder="Please Enter the Price" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="user-type">Upload Image:</label>
              <input type="file" id="upload-image" name="upload-image[]" class="form-control1 w-100" multiple required>
            </div>
            <div class="col-md-4 form-group">
              <label for="user-type">Upload Video:</label>
              <input type="file" id="upload-video" name="upload-video" class="form-control1 w-100" required>
            </div>
            <div class="col-md-4 form-group">
              <label for="user-type">Enter Area (in Square/Feet):</label>
              <input type="number" step="any" class="form-control1 w-100" name="area" placeholder="Enter Area" required>
            </div>

          </div>

          <div class="row">
            <div class="col-md-4 form-group">
              <label for="property-description">Enter Property Description:</label>
              <textarea id="property-description" class="form-control2 w-100" name="property-description" placeholder="Enter Property Description" required></textarea>
            </div>
          </div>

          <div class="row">
            <div class="center-container">
              <input type="submit" class="btn btn-black py-3 btn-block" name="submit" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <footer>
    <!-- Footer Content -->
  </footer>

  <!-- JavaScript Libraries -->
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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    function showForm(formId) {
      // Hide all forms (in this example, only "for-sale" exists)
      document.getElementById('for-sale').style.display = 'none';
      // Show the selected form
      document.getElementById(formId).style.display = 'block';
    }
  </script>
</body>

</html>