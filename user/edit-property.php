<?php
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/FileManager.php';

$session = new SessionManager();
$sUser   = $session->getObject("user");

$property = new Property();
$originalImageIds = [];
$originalVideoIds = [];

// Grab propertyId from GET or default to 0
$propertyId = isset($_GET['propertyId']) ? intval($_GET['propertyId']) : 0;
if ($propertyId) {
  // Instantiate Property and load data
  $property->getByPropertyIdAndStatus($propertyId);

  // Original file IDs (as loaded from the database)
  $originalImageIds = array_filter(array_map('trim', explode(',', $property->property_image_file_ids)));
  $originalVideoIds = array_filter(array_map('trim', explode(',', $property->property_video_file_ids)));
}


if (isset($_POST['propertyUpdate'])) {
  // Update property details from form
  $property->property_id        = $_POST['propertyUpdate'];
  $property->property_title    = $_POST['property-title'];
  $property->property_category = $_POST['property_category'];
  $property->division          = $_POST['division'];
  $property->address           = $_POST['address'];
  $property->bedroom_no        = $_POST['bedroom'];
  $property->bathroom_no       = $_POST['bathroom'];
  $property->price             = $_POST['price'];
  $property->area              = $_POST['area'];
  $property->description       = $_POST['property-description'];

  /*
   * Forward only the IDs that are not deleted.
   * The hidden fields "existingImageIds" and "existingVideoIds" are updated via JavaScript.
   */
  $remainingImageIds = isset($_POST['existingImageIds'])
    ? array_filter(array_map('trim', explode(',', $_POST['existingImageIds'])))
    : [];
  $remainingVideoIds = isset($_POST['existingVideoIds'])
    ? array_filter(array_map('trim', explode(',', $_POST['existingVideoIds'])))
    : [];

  // foreach ($remainingImageIds as $id) {
  //   echo $id . " iamge <br>";
  // }
  // foreach ($remainingVideoIds as $id) {
  //   echo $id . " vidoe<br>";
  // }

  // exit;

  // Process new image uploads
  $newImageIds = [];
  for ($i = 0; $i < count($_FILES['property-images-upload']['name']); $i++) {
    $fileArray = [
      'name'     => $_FILES['property-images-upload']['name'][$i],
      'type'     => $_FILES['property-images-upload']['type'][$i],
      'tmp_name' => $_FILES['property-images-upload']['tmp_name'][$i],
      'error'    => $_FILES['property-images-upload']['error'][$i],
      'size'     => $_FILES['property-images-upload']['size'][$i],
    ];
    $fileManager = new FileManager();
    $fileManager->insert();
    $newId = $fileManager->doOp($fileArray);
    $fileManager->update();
    if ($newId) {
      // echo $fileManager->file_id . " new image <br>";
      $newImageIds[] = $fileManager->file_id;
    }
  }

  // Merge the remaining image IDs with new ones
  $finalImageIds = array_merge($remainingImageIds, $newImageIds);
  $property->property_image_file_ids = !empty($finalImageIds) ? implode(',', $finalImageIds) : '';

  // Process videos in the same way
  $newVideoIds = [];
  if (!empty($_FILES['property-videos-upload']['name'][0])) {
    for ($i = 0; $i < count($_FILES['property-videos-upload']['name']); $i++) {
      $fileArray = [
        'name'     => $_FILES['property-videos-upload']['name'][$i],
        'type'     => $_FILES['property-videos-upload']['type'][$i],
        'tmp_name' => $_FILES['property-videos-upload']['tmp_name'][$i],
        'error'    => $_FILES['property-videos-upload']['error'][$i],
        'size'     => $_FILES['property-videos-upload']['size'][$i],
      ];
      $fileManager = new FileManager();
      $fileManager->insert();
      $newId = $fileManager->doOp($fileArray);
      $fileManager->update();
      if ($newId) {
        $newVideoIds[] = $fileManager->file_id;
      }
    }
  }
  $finalVideoIds = array_merge($remainingVideoIds, $newVideoIds);
  $property->property_video_file_ids = !empty($finalVideoIds) ? implode(',', $finalVideoIds) : '';

  // printing all properties of this class
  // echo "<pre>";
  // print_r($property);
  // echo "</pre>";

  echo $property->property_image_file_ids . " image <br>";
  echo $property->property_video_file_ids . " video <br>";
  // Finally, update the property record in the database.
  // $property->update();
  if ($property->update()) {
    include_once '../pop-up.php';
    showPopup("Property details updated successfully. Property ID: {$property->property_id}");
  } else {
    include_once '../pop-up.php';
    showPopup("Error updating property details. Property ID: {$property->property_id}. <br> Please try again.");
  }

  // (Optionally) Refresh the original arrays if needed.
  $originalImageIds = $finalImageIds;
  $originalVideoIds = $finalVideoIds;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard(User) - Edit Property</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">
  <!-- CSS for Media Edit -->
  <style>
    .file-container {
      display: inline-block;
      margin-bottom: 15px;
      text-align: center;
      transition: opacity 0.3s ease;
      overflow: hidden;
      position: relative;
    }

    .file-container img,
    .file-container video {
      display: block;
      width: 100%;
      height: auto;
    }

    .delete-btn {
      display: inline-block;
      background-color: rgba(255, 0, 0, 0.8);
      color: #fff;
      padding: 5px 10px;
      margin-top: 5px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .delete-btn:hover {
      background-color: rgba(255, 0, 0, 1);
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <?php include_once 'sidebar-user.php'; ?>

  <!-- Main Content -->
  <div id="main-content" class="main-content">
    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
      <h5>Edit Property</h5>
    </div>

    <div class="container mt-4">
      <!-- Display Message if exists -->
      <?php if (!empty($message)) { ?>
        <div class="alert alert-info">
          <?php echo $message; ?>
        </div>
      <?php } ?>

      <div class="card__wrapper">
        <!-- Property Details Header -->
        <div class="card__title-wrap mb-20">
          <h3 class="table__heading-title mb-4">Property Details</h3>
          <h4 class="table__heading-title mb-3">Property ID: <?php echo $property->property_id; ?></h4>
        </div>
        <hr>

        <!-- Form: Edit Property Details -->
        <form action="" method="post" class="profile-page-form mb-4" enctype="multipart/form-data">
          <!-- Hidden fields to forward only non-deleted IDs -->
          <input type="hidden" name="existingImageIds" id="existingImageIds" value="<?php echo implode(',', $originalImageIds); ?>">
          <input type="hidden" name="existingVideoIds" id="existingVideoIds" value="<?php echo implode(',', $originalVideoIds); ?>">

          <!-- Property Title -->
          <div class="row align-items-center mb-4">
            <div class="col-md-6">
              <label class="form-label">Property Title:</label>
              <input type="text" class="form-control" name="property-title" value="<?php echo $property->property_title; ?>" required>
            </div>
          </div>

          <!-- Category, Division, Address -->
          <div class="row mb-4">
            <div class="col-md-4">
              <label for="property_category" class="form-label">Property Category:</label>
              <select class="form-control" id="property_category" name="property_category" required>
                <option value="residential" <?php if ($property->property_category === 'residential') echo 'selected'; ?>>Residential</option>
                <option value="commercial" <?php if ($property->property_category === 'commercial') echo 'selected'; ?>>Commercial</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="division" class="form-label">Division:</label>
              <input type="text" class="form-control" id="division" name="division" value="<?php echo $property->division; ?>" required>
            </div>
            <div class="col-md-4">
              <label for="address" class="form-label">Address:</label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $property->address; ?>" required>
            </div>
          </div>

          <!-- Bedrooms, Bathrooms, Price -->
          <div class="row mb-4">
            <div class="col-md-4">
              <label for="bedroom" class="form-label">Bedrooms:</label>
              <input type="number" class="form-control" id="bedroom" name="bedroom" value="<?php echo $property->bedroom_no; ?>" required>
            </div>
            <div class="col-md-4">
              <label for="bathroom" class="form-label">Bathrooms:</label>
              <input type="number" class="form-control" id="bathroom" name="bathroom" value="<?php echo $property->bathroom_no; ?>" required>
            </div>
            <div class="col-md-4">
              <label for="price" class="form-label">Price:</label>
              <input type="number" class="form-control" id="price" name="price" value="<?php echo $property->price; ?>" required>
            </div>
          </div>

          <!-- Area, Description -->
          <div class="row mb-4">
            <div class="col-md-4">
              <label for="area" class="form-label">Area (in Square Feet):</label>
              <input type="number" class="form-control" id="area" name="area" value="<?php echo $property->area; ?>" required>
            </div>
            <div class="col-md-8">
              <label for="property-description" class="form-label">Property Description:</label>
              <textarea class="form-control" id="property-description" name="property-description" rows="4" required><?php echo $property->description; ?></textarea>
            </div>
          </div>

          <!-- Property Images Section -->
          <div class="row mb-4">
            <div class="col-md-12">
              <label for="property-images" class="form-label">Property Images:</label>
              <div class="row" id="imagesContainer">
                <?php foreach ($originalImageIds as $fileId) {
                  $file = new FileManager();
                  $file->setValueById($fileId);
                ?>
                  <div class="col-md-3 file-container" data-file-id="<?php echo $file->file_id; ?>" data-type="image">
                    <img src="../file/<?php echo $file->file_new_name; ?>" alt="Property Image" class="img-fluid">
                    <div class="delete-btn">Delete</div>
                  </div>
                <?php } ?>
              </div>
              <label for="property-images-upload" class="form-label mt-3">Upload New Images:</label>
              <input type="file" class="form-control" id="property-images-upload" name="property-images-upload[]" multiple>
            </div>
          </div>

          <!-- Property Videos Section -->
          <div class="row mb-4">
            <div class="col-md-12">
              <label for="property-videos" class="form-label">Property Videos:</label>
              <div class="row" id="videosContainer">
                <?php foreach ($originalVideoIds as $fileId) {
                  $file = new FileManager();
                  $file->setValueById($fileId);
                ?>
                  <div class="col-md-3 file-container" data-file-id="<?php echo $file->file_id; ?>" data-type="video">
                    <video controls>
                      <source src="../file/<?php echo $file->file_new_name; ?>" type="video/mp4">
                    </video>
                    <div class="delete-btn">Delete</div>
                  </div>
                <?php } ?>
              </div>
              <label for="property-videos-upload" class="form-label mt-3">Upload New Videos:</label>
              <input type="file" class="form-control" id="property-videos-upload" name="property-videos-upload[]" accept="video/*" multiple>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="card-footer text-end">
            <button type="submit" name="propertyUpdate" value="<?php echo $property->property_id; ?>" class="btn btn-primary ms-2">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- JavaScript: Update hidden fields on deletion -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // When a delete button is clicked, remove the container and update the hidden input.
      document.querySelectorAll('.delete-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          var container = this.closest('.file-container');
          var fileId = container.getAttribute('data-file-id');
          var type = container.getAttribute('data-type'); // image or video
          // Remove the container from the DOM
          container.parentNode.removeChild(container);

          // Update the corresponding hidden input
          if (type === 'image') {
            updateHiddenField('existingImageIds', fileId);
          } else {
            updateHiddenField('existingVideoIds', fileId);
          }
        });
      });

      // Function to remove a fileId from a comma-separated hidden input field.
      function updateHiddenField(fieldId, fileIdToRemove) {
        var hiddenField = document.getElementById(fieldId);
        var ids = hiddenField.value ? hiddenField.value.split(',') : [];
        var newIds = ids.filter(function(id) {
          return id !== fileIdToRemove;
        });
        hiddenField.value = newIds.join(',');
      }
    });
  </script>
</body>

</html>