<?php
include_once 'php-class-file/SessionManager.php';
$session = SessionStatic::class;

$session = new Session();
// session->destroy();
include_once 'pop-up.php';
$session->get('msg1') ? showPopup($session->get('msg1')) : '';
$session->delete('msg1');


if(isset($_POST['log_in'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'php-class-file/User.php';
    $user = new User();
    $user->email = $email;
    $user->password = $password;
    $userCheck = $user->checkUserEmailWithStatus($user->email, $user->password, "client");

    if($userCheck[0] == 1){
        include_once 'pop-up.php';
        showPopup($userCheck[1]);
        $session->storeObject('user', $user);
        // Check if a redirect URL is set in session
        $redirect_url = $session->get('redirect_url') ? $session->get('redirect_url') : 'index.php';
        $session->delete('redirect_url');
        echo "<script>window.location = '$redirect_url';</script>";
        exit();
        
        // header('Location: index.php');
        // echo"<script>window.location = 'index.php';</script>";
        // exit();

       

    }
    else{
        include_once 'pop-up.php';
        showPopup($userCheck[1]);
    }
}

$alreadyLoggedIn = false;
if($session->getObject('user') !==null){
    // $alreadyLoggedIn = true;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link rel="stylesheet" href="login.css">


    <!-- Include Font Awesome (or any icon library) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include_once 'navbar-user.php'; ?>

    <section class="section1">
        <!-- HTML !-->
            <div class="container1">
                <!-- HTML !-->
                <div class="login-box">
                    <!-- <div class="button-container-home">
                    <button class="button-home" onclick="location.href='index.html'">Homepage</button>
                </div> -->
                    <!-- HTML !-->
                    <!-- HTML !-->
                    <!-- <button class="home" onclick="location.href='index.html'" role="button"><span class="text">GO TO
                            HOMEPAGE</span></button> -->
                    <!-- <hr> -->
                     <?php if($alreadyLoggedIn === false) { ?>
                    <form method="post" action="" enctype="multipart/form-data">
                    <h2>Login Here</h2>
                    <!-- <p class="signup-text1" style="padding:0px;">Please Login using User ID and Password</p> -->
                    <hr>
                    <div class="input-field">
                        <label for="user-type">User Type:</label>
                        <select id="user-type" name="user_type" required>
                            <option value="client" id="option1">Client</option>
                            <!-- <option value="admin" id="option1">Admin</option> -->
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enter your Email Address" required>
                    </div>
                    <div class="input-field">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="checkbox-field">
                        <!-- <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember Me</label> -->
                        <a href="reset-password-step1.php" class="forgot-password"><b><i>Forget Password?</i></b></a>
                    </div>
                    <!-- <button class="login-btn">Login</button> -->
                    <div class="button-container">
                        <button class="button-56" name="log_in" type="submit" role="button">LOG IN</button>
                    </div>
                </form>
                    <hr>
               
                <form method="post" action="signup-step1.php" enctype="multipart/form-data">

                    <p class="signup-text">Don't have an account? <a href="signup-step1.php">Sign Up</a></p>
                    <div class="button-container2">
                        <button class="btn-signup" name="sign_up" type="submit" role="button">SIGN UP</button>
                    </div>
                    </form>
                    <?php } else { ?>
                                    <?php } ?>
                </div>
            </div>
           
        
            <!-- Login Button -->
            <!-- <button class="button-56" onclick="showPopup()">Login</button> -->
        
    </section>

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
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
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