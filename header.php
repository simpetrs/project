<?php
session_start();
if (! isset($_SESSION['user_Id'])) {
    header("location:../index.php");
    exit;
}
if ($_SESSION['role'] != 3){
    header("location:../logout.php");
    exit;
}
include_once './config.php';
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

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../ajax.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href='../lib/main.css' rel='stylesheet' />
    <script src='../lib/main.js'></script>
    <script>

    </script>
</head>


<body class="bg-white">

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="farmer_page.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">VERMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="./search.php">
            <input type="text" name="query" placeholder="Search for Doctor" title="Enter search keyword" <?=isset($_GET['query']) ? "value='" . $_GET['query'] . "'" : ''?>>
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
                        <a href="./pages-appointments.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                    $data = mysqli_query($conn, "select name, appointment.date_added, appointment.status  from appointment left join user on user.user_Id = appointment.doctor  where  user = '" . $_SESSION['user_Id'] . "' and (status = 1 or status = 2) order by id desc") or die(mysqli_error($conn));
                    ?>

                    <?php
                    while($row = mysqli_fetch_array($data)) {
                        ?>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Appointment</h4>
                                <p><a href="./pages-appointments.php"><?=$row['name']?> has <?=$row['status'] == 1 ? 'Approved' : 'Rejected'?> you appoitnment</a></p>
                                <p><?=$row['date_added']?></p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    $data = mysqli_query($conn, "select name, messages.date_added  from messages left join user on user.user_Id = messages.sender  where  receiver = '" . $_SESSION['user_Id'] . "'  order by id desc") or die(mysqli_error($conn));
                    ?>

                    <?php
                    while($row = mysqli_fetch_array($data)) {
                        ?>
                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Note</h4>
                                <p><a href="./pages-messages.php"><?=$row['name']?> has updated your appointment with a note.</a></p>
                                <p><?=$row['date_added']?></p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                    }
                    ?>








                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/<?=$_SESSION['photo']?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['names']?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?=$_SESSION['names']?></h6>

                        <span>Farmer</span>
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
            <a class="nav-link " href="farmer_page.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Farmer Dashboard</span>
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
            <a class="nav-link collapsed" href="pages-payment.php">
            <i class="fa fa-money" aria-hidden="true"></i>
                <span>Payments</span>
            </a>
        </li><!-- End payments Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="fa fa-wrench" aria-hidden="true"></i>
                <span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="pages-makeappointment.php">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Make Appointment</span>
                    </a>
                </li>

                <li>
                    <a href="pages-reportdisease.php">
                        <i class="fa fa-bug" aria-hidden="true"></i><span>Report Case</span>
                    </a>
                </li>
                <li>
                    <a href="cases.php">
                        <i class="fa fa-bug" aria-hidden="true"></i><span>Reported Cases</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Services Nav -->

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
