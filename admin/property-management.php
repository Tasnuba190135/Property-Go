<?php
// Include necessary PHP class files (adjust paths as needed)
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/PropertyDetails.php';
include_once '../pop-up.php';

if (isset($_POST['archive'])) {
    $property = new Property();
    $propertyDetails = new PropertyDetails();

    $property_id = $_POST['property_id'];
    $status = $_POST['archive'] == 2 ? 2 : 1; // 2 for Archive, 1 for Unarchive

    $property->property_id = $property_id;
    $property->setValue();
    $property->status = $status;
    $property->update();

    $propertyDetails->setValueByPropertyId($property->property_id);
    $propertyDetails->status = $status;
    $propertyDetails->update();

    include_once '../pop-up.php';
    showPopup($status == 2 ? "Archived" : "Unarchived");
}

$property = new Property();
$properties = $property->getRowsByUserIdAndStatus(null);

;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard - Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">


</head>

<body>
    <?php include_once 'sidebar-admin.php'; ?>
    <div id="main-content" class="main-content">
        <div class="header d-flex justify-content-between align-items-center">
            <h5>Property Management</h5>
            <button class="toggle-btn d-md-none" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="container mt-4">
            <div class="card__wrapper">
                <div class="card__title-wrap mb-20">
                    <h3 class="table__heading-title">Property Management</h3>
                </div>
                <div class="attendant__wrapper ">
                    <table id="userTable" class="display">
                        <thead>
                            <tr>
                                <th>Property Title</th>
                                <th>Property ID</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($properties)) {
                                foreach ($properties as $prop) {
                                    $propertyDetails = new PropertyDetails();
                                    $propertyDetails->setValueByPropertyId($prop['property_id']);
                                    $statusText = $propertyDetails->status == 2 ? "Archived" : "Active";
                                    $buttonText = $propertyDetails->status == 2 ? "Unarchive" : "Archive";
                                    $buttonValue = $propertyDetails->status == 2 ? 1 : 2;
                            ?>
                                    <tr>
                                        <td><?php echo $propertyDetails->property_title; ?></td>
                                        <td><?php echo $propertyDetails->property_id; ?></td>
                                        <td><?php echo $propertyDetails->created; ?></td>
                                        <td><?php echo $statusText; ?></td>
                                        <td>
                                            <div class="attendant__action">
                                                <a href="property-check.php?propertyId=<?php echo $propertyDetails->property_id; ?> & property-check.php?status=<?php echo $propertyDetails->status; ?> "target="_blank" class="btn btn-primary">Details</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="attendant__action">
                                                <form method="POST" action="">
                                                    <input type="hidden" name="property_id" value="<?php echo $propertyDetails->property_id; ?>" />
                                                    <button type="submit" name="archive" value="<?php echo $buttonValue; ?>" class="btn btn-success"><?php echo $buttonText; ?></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<p>No properties found.</p>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        const toggleBtn = document.getElementById("toggle-btn");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
        });
    </script>
</body>

</html>
