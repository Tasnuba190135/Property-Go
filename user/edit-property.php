<?php
// Include necessary PHP class files
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/FileManager.php';

$session = new SessionManager();
$sUser   = $session->getObject("user");

// Grab propertyId from GET or default to 0
$propertyId = isset($_GET['propertyId']) ? intval($_GET['propertyId']) : 0;

// Instantiate PropertyDetails and load the data
$property = new Property();
$property->getByPropertyIdAndStatus($propertyId);

$imageFileIds = explode(',', $property->property_image_file_ids);
$imageFileIds = array_filter(array_map('trim', $imageFileIds));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG v3</title>

  <!-- stage 1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">

  <!-- stage 2 -->
  <link href="../img/favicon.ico" rel="icon">
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
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/property.css">
</head>

<body>
  <?php include_once 'sidebar-user.php'; ?>

  <!-- Display session message if it exists -->
  <?php
  if ($session->get('msg1')) {
    echo "<div class='alert alert-info'>{$session->get('msg1')}</div>";
    $session->delete('msg1');
  }
  ?>

  <div id="main-content" class="main-content">

    <?php if ($sUser): ?>
      <div class="realestate-tabpane pb-5 pt-5">
        <div class="container tab-content">
          <form method="post" enctype="multipart/form-data" action="" id="for-sale">
            <!-- Property Title -->
            <div class="row">
              <div class="col-md-4 form-group">
                <label for="property-title">Property title:</label>
                <input
                  type="text"
                  class="form-control1 w-100"
                  name="property-title"
                  placeholder="Title"
                  required
                  value="<?php echo $property->property_title; ?>">
              </div>
            </div>

            <!-- Category, Division, Address -->
            <div class="row">
              <div class="col-md-4 form-group">
                <label for="property_category">Choose Property Category:</label>
                <select name="property_category" class="form-control1 w-100" required>
                  <?php
                  $currentCategory = $property->property_category;
                  ?>
                  <option value="residential"
                    <?php echo ($currentCategory === 'residential') ? 'selected' : ''; ?>>
                    Residential
                  </option>
                  <option value="commercial"
                    <?php echo ($currentCategory === 'commercial') ? 'selected' : ''; ?>>
                    Commercial
                  </option>
                </select>
              </div>
              <div class="col-md-4 form-group">
                <label for="division">Choose Division:</label>
                <select name="division" class="form-control1 w-100" required>
                  <?php
                  $currentDivision = $property->division;
                  $divisions = [
                    'dhaka',
                    'khulna',
                    'rajshahi',
                    'barishal',
                    'chittagong',
                    'sylhet',
                    'dinajpur',
                    'rangpur',
                    'mymensingh'
                  ];
                  foreach ($divisions as $d) {
                    $selected = ($currentDivision === $d) ? 'selected' : '';
                    echo "<option value='{$d}' {$selected}>" . ucfirst($d) . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-4 form-group">
                <label for="location">Enter Address:</label>
                <input
                  type="text"
                  class="form-control1 w-100"
                  name="location"
                  placeholder="Address"
                  required
                  value="<?php echo ($property->address); ?>">
              </div>
            </div>

            <!-- Bedrooms, Bathrooms, Price -->
            <div class="row">
              <div class="col-md-4 form-group">
                <label for="bedroom">Choose Bedrooms:</label>
                <input
                  type="number"
                  class="form-control1 w-100"
                  name="bedroom"
                  placeholder="Choose Bedrooms"
                  required
                  value="<?php echo ($property->bedroom_no); ?>">
              </div>
              <div class="col-md-4 form-group">
                <label for="bathroom">Choose Bathrooms:</label>
                <input
                  type="number"
                  class="form-control1 w-100"
                  name="bathroom"
                  placeholder="Choose Bathrooms"
                  required
                  value="<?php echo ($property->bathroom_no); ?>">
              </div>
              <div class="col-md-4 form-group">
                <label for="price">Enter Price:</label>
                <input
                  type="number"
                  name="price"
                  class="form-control1 w-100"
                  placeholder="Please Enter the Price"
                  required
                  value="<?php echo ($property->price); ?>">
              </div>
            </div>

            <!-- Image, Video, Area -->
            <div class="row">
              <div class="col-md-4 form-group">
                <label for="upload-image">Upload Image:</label>
                <input
                  type="file"
                  id="upload-image"
                  name="upload-image[]"
                  class="form-control1 w-100"
                  multiple>
              </div>
              <div class="col-md-8 form-group">
                <label>Existing Images:</label>
                <?php if (!empty($imageFileIds)): ?>
                  <div class="d-flex flex-wrap">
                    <?php foreach ($imageFileIds as $fileId): ?>
                      <?php
                      // Retrieve file info from FileManager
                      $file = new FileManager();
                      $file->setValueById($fileId);

                      // The "file_new_name" is the unique name stored on the server
                      // Path is "../file/"
                      $imagePath = '../file/' . $file->file_new_name;
                      ?>

                      <div class="position-relative me-3 mb-3" style="width: 120px;">
                        <!-- Thumbnail that links to the full image -->
                        <a href="<?php echo $imagePath; ?>" target="_blank">
                          <img
                            src="<?php echo $imagePath; ?>"
                            alt="Property Image"
                            style="width: 120px; height: 80px; object-fit: cover;">
                        </a>

                        <!-- Delete link (X) -->
                        <!-- This calls deleteImage.php with file_id and propertyId in the URL -->
                        <a
                          href="deleteImage.php?file_id=<?php echo urlencode($fileId); ?>&propertyId=<?php echo urlencode($propertyId); ?>"
                          class="text-danger fw-bold position-absolute top-0 end-0 bg-white px-2"
                          style="text-decoration: none; cursor: pointer;"
                          onclick="return confirm('Are you sure you want to delete this image?');">
                          &times;
                        </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <p>No images uploaded yet.</p>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                <label for="upload-video">Upload Video:</label>
                <input
                  type="file"
                  id="upload-video"
                  name="upload-video"
                  class="form-control1 w-100">
              </div>
              <div class="col-md-4 form-group">
                <label for="upload-video">Current video</label>
                <?php
                $videoFile = new FileManager();
                $videoFile->setValueById($property->property_video_file_ids);
                ?>
                <video width="320" height="240" controls>
                  <source src="../file/<?php echo $videoFile->file_new_name; ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <?php
                // If there's an existing record, show the existing video
                if ($propertyId && !empty($property->property_video_file_ids)) {
                  echo "<p>Current video file ID: "
                    . ($property->property_video_file_ids)
                    . "</p>";
                }
                ?>
              </div>
            </div>

            <div class="col-md-4 form-group">
              <label for="area">Enter Area (in Square/Feet):</label>
              <input
                type="number"
                step="any"
                class="form-control1 w-100"
                name="area"
                placeholder="Enter Area"
                required
                value="<?php echo ($property->area); ?>">
            </div>
        </div>

        <!-- Description -->
        <div class="row">
          <div class="col-md-8">
            <label for="property-description">Enter Property Description:</label>
            <textarea
              id="property-description"
              class="form-control2 w-100"
              name="property-description"
              placeholder="Enter Property Description"
              required><?php echo ($property->description); ?></textarea>
          </div>
        </div>



        <!-- Submit -->
        <div class="center-container">
          <input
            type="submit"
            class="btn btn-black py-3 btn-block"
            name="submit"
            value="<?php echo ($propertyId ? 'Update Property' : 'Submit'); ?>">
        </div>
        </form>
      </div>
  </div>
<?php else: ?>
  <p>Please log in to see or edit property details.</p>
<?php endif; ?>

</div>
<footer>
  <!-- Footer Content -->
</footer>

<!-- JavaScript Libraries -->
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery/jquery-migrate.min.js"></script>
<script src="../lib/popper/popper.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/scrollreveal/scrollreveal.min.js"></script>
<script src="../contactform/contactform.js"></script>
<script src="../js/main.js"></script>
<script src="../js/service.js"></script>
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>

</body>

</html>