<?php
session_start();
if (! isset($_SESSION['user_Id'])) {
    header("location:../index.php");
    exit;
}
if ($_SESSION['role'] != 2){
    header("location:../logout.php");
    exit;
}
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VERMS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!--Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href='../lib/main.css' rel='stylesheet' />
    <script src='../lib/main.js'></script>

    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="admin_page.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">VERMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="./search.php">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword" <?=isset($_GET['query']) ? "value='" . $_GET['query'] . "'" : ''?>>
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="badge bg-primary badge-number"></span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        Notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                    $data = mysqli_query($conn, "select name, appointment.date_added, amount from payments left join user on user.user_Id = payments.user left join appointment on appointment.id = payments.appointment where payments.status = 1 and doctor = '" . $_SESSION['user_Id'] . "' order by payments.id desc") or die(mysqli_error($conn));
                    ?>

                    <?php
                    while($row = mysqli_fetch_array($data)) {
                        ?>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Appointment</h4>
                                <p><a href="./pages-appointments.php"><?=$row['name']?> has requested for an appointment</a></p>
                                <p><?=$row['date_added']?></p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                    }
                    ?>
                    <li class="dropdown-footer">
                        <a href="./pages-appointments.php">Go to appointments</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/<?=$_SESSION['photo']?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><h6><?=$_SESSION['names']?></h6></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?=$_SESSION['names']?></h6>
                        <span>Vet Doctor</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- <li class="nav-item">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link " href="doctor_page.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Doctor Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-appointments.php">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                <span>Appointments</span>
            </a>
        </li><!-- End appointment Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-diseases.php">
                <i class="fa fa-bug" aria-hidden="true"></i>
                <span>Reported Diseases</span>
            </a>
        </li><!-- End Diseases Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-reports.php">
                <i class="fa fa-flag" aria-hidden="true"></i>
                <span>Reports</span>
            </a>
        </li><!-- End Reports Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-messages.php">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
            </a>
        </li><!-- End messages Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-calender.php">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span>Calender</span>
            </a>
        </li><!-- End Calender Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.php">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
