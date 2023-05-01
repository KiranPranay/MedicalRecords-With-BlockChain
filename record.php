<?php

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gaana_medical_records";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$recordId="";
if(isset($_GET['recordId'])){
  $recordId=$_GET['recordId'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Record</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">
                        <i class="fa fa-search me-2"></i>SEO<span class="fs-5">Master</span>
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index" class="nav-item nav-link">Home</a>
                        <a href="about" class="nav-item nav-link">About</a>
                        <a href="upload" class="nav-item nav-link">Upload</a>
                        <a href="fetch" class="nav-item nav-link active">Fetch</a>


                    </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Fetch</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px" />
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a class="text-white" href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-white" href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">
                                        Fetch
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7)">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px">
                            <input type="text" class="form-control bg-transparent border-light p-3"
                                placeholder="Type search keyword" />
                            <button class="btn btn-light px-4">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
                            data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">
                                Upload Data
                            </h6>
                            <h2 class="mt-2">Fetch Patient Data Here</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <div class="row g-3">
                                <!-- Record Id  -->
                                <div class="col-sm-6">
                                    <input id="recordidval" value="<?php echo $recordId; ?>" hidden>
                                    <h6 class="mb-3">Record Id: <b id="recordId"> <?php echo $recordId; ?></b></h6>
                                </div>
                                <!-- patientName  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Patient Name: <b id="patientName"></b></h6>
                                    <h6 class="mb-0">
                                        Doctor Name:
                                        <b id="doctorName"></b>
                                    </h6>
                                </div>
                                <!-- hospitalName  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Hospital Name:
                                        <b id="hospitalName"></b>
                                    </h6>
                                </div>
                                <!-- year and date  -->
                                <div class="col-sm-6">

                                    <h6 class="mb-0">
                                        Date:
                                        <b id="date"></b>
                                    </h6>
                                </div>
                                <!-- Vital Statistics  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Vital Statistics:
                                        <b id="vitalStatistics"></b>
                                    </h6>
                                </div>
                                <!-- Symptoms  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Symptoms:
                                        <b id="symptoms"></b>
                                    </h6>
                                </div>
                                <!-- Treatment  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Treatment:
                                        <b id="treatment"></b>
                                    </h6>
                                </div>
                                <!-- nextCheckupDate  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Next Checkup Date:
                                        <b id="nextCheckupDate"></b>
                                    </h6>
                                </div>
                                <!-- Extra Note  -->
                                <div class="col-sm-6">
                                    <h6 class="mb-3">
                                        Extra Note:
                                        <b id="extraNote"></b>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p>
                            <i class="fa fa-map-marker-alt me-3"></i>Laxman Reddy Avenue, Dundigal, Hyderabad, Telangana
                            500043
                        </p>
                        <p><i class="fa fa-phone-alt me-3"></i>+91 9866675818</p>
                        <p><i class="fa fa-envelope me-3"></i>reachweber@cottonseeds.org</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="about.html">About Us</a>
                        <a class="btn btn-link" href="upload.html">Upload</a>
                        <a class="btn btn-link" href="fetch.html">Fetch Us</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Project Gallery</h5>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-1.jpg" alt="Image" />
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-2.jpg" alt="Image" />
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-3.jpg" alt="Image" />
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-4.jpg" alt="Image" />
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-5.jpg" alt="Image" />
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="img/portfolio-6.jpg" alt="Image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>
                            Join us in transforming the healthcare industry for the better.
                        </p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                                placeholder="Your Email" style="height: 48px" />
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
                                <i class="fa fa-paper-plane text-primary fs-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">WeberMedico</a>, All
                            Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By
                            <a class="border-bottom" href="https://weber.cottonseeds.com">Weber Technologies</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="index.html">Home</a>
                                <a href="about.html">about</a>
                                <a href="upload.html">upload</a>
                                <a href="fetch.html">fetch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="fetchbundle.js?v=2"></script>
</body>

</html>