<?php
// hellow world
// Include necessary PHP class files (adjust paths as needed)
include_once '../php-class-file/SessionManager.php';
include_once '../php-class-file/User.php';
include_once '../php-class-file/Property.php';
include_once '../php-class-file/PropertyDetails.php';
include_once '../pop-up.php';

// $session = new SessionManager();

if (isset($_POST['approve']) || isset($_POST['reject'])) {
    $property = new Property();
    $propertyDetails = new PropertyDetails();

    $property_id = $_POST['property_id'];

    if (isset($_POST['approve'])) {
        $property->property_id = $property_id;
        $property->setValue();
        $property->status = 1;
        $property->update();

        $propertyDetails->setValueByPropertyId($property->property_id);
        $propertyDetails->status = 1;
        $propertyDetails->update();

        include_once '../pop-up.php';
        showPopup("Accepted");
    }
    // Check if 'reject' button was clicked and set status to 0 (rejected)
    elseif (isset($_POST['reject'])) {
        $property->property_id = $property_id;
        $property->setValue();
        $property->status = 0;
        $property->update();

        $propertyDetails->setValueByPropertyId($property->property_id);
        $propertyDetails->status = 0;
        $propertyDetails->update();

        include_once '../pop-up.php';
        showPopup("Rejected");
    }
}

// Retrieve properties for this user
$property = new Property();
$properties = $property->getRowsByUserIdAndStatus(null, 0);
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

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/property.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <style>
        .modal-dialog {
            max-width: 1050px !important;
            margin-right: auto;
            margin-left: auto;
        }

        .modal-content {
            padding: 40px;
        }

        .modal-intro-single-section {
            padding: 60px 0px !important;
        }

        .modal-dialog-scrollable .modal-content {
            overflow-y: auto !important;
        }

        ul li {
            list-style-type: none !important;
        }


        /* Set the carousel image size and ensure full view without cropping */
        #propertyCarousel .carousel-inner img {
            width: 500px;
            height: 500px;
            object-fit: contain;
            margin: auto;
            /* Center the image horizontally */
        }
    </style>


</head>

<body>
    <!-- Sidebar -->
    <?php include_once 'sidebar-admin.php'; ?>

    <!-- Main Content -->
    <div id="main-content" class="main-content">
        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center">
            <h5>Property Review</h5>
            <!-- Toggle Button -->
            <button class="toggle-btn d-md-none" id="toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Content -->
        <div class="container mt-4">
            <div class="card__wrapper">
                <div class="card__title-wrap mb-20">
                    <h3 class="table__heading-title">Property Review</h3>
                </div>
                <div class="attendant__wrapper ">
                    <table id="userTable" class="display">
                        <thead>
                            <tr>
                                <th>Property title</th>
                                <th>Property ID</th>
                                <th>Created</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($properties)) {
                                foreach ($properties as $prop) {
                                    // Load property details for the current property_id
                                    $propertyDetails = new PropertyDetails();
                                    $propertyDetails->setValueByPropertyId($prop['property_id']);
                            ?>
                                    <tr>
                                        <td><?php echo $propertyDetails->property_title; ?></td>
                                        <td><?php echo $propertyDetails->property_id; ?></td>
                                        <td><?php echo $propertyDetails->created; ?></td>
                                        <td>
                                            <div class="attendant__action">
                                                <a href="property-check.php?propertyId=<?php echo $propertyDetails->property_id; ?>" target="_blank" class="btn btn-primary">Details</a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="attendant__action">
                                                <form method="POST" action="">
                                                    <!-- Hidden property_id field to pass along with form submission -->
                                                    <input type="hidden" name="property_id" value="<?php echo $propertyDetails->property_id; ?>" />
                                                    <button type="submit" name="approve" value="1" class="btn btn-success">Approve</button>
                                                    <button type="submit" name="reject" value="0" class="btn btn-danger">Reject</button>
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


    <!-- JavaScript -->

    <!-- JavaScript Libraries -->
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery/jquery-migrate.min.js"></script>
    <script src="../lib/popper/popper.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="../css/contactform/contactform.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/scrollreveal/scrollreveal.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="../js/main.js"></script>
    <script src="js/service.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable(); // Initialize DataTables on #userTable
        });

        const toggleBtn = document.getElementById("toggle-btn");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
        });
    </script>
</body>

</html>