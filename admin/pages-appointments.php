<?php session_start() ?>
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
  <link rel="stylesheet" href="assets/css/datatables.min.css">

  <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
 
  
</head>

<?php

include 'config.php';
// $userId1 = $_SESSION["userId1"];
$retreive = "SELECT * FROM appointment";
$sql_query = mysqli_query($conn, $retreive);
?>

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
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
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
  <span class="badge bg-primary badge-number">4</span>
</a><!-- End Notification Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
  <li class="dropdown-header">
    You have 4 new notifications
    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-exclamation-circle text-warning"></i>
    <div>
      <h4>team</h4>
      <p>Project</p>
      <p>30 min. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-x-circle text-danger"></i>
    <div>
      <h4>All</h4>
      <p>Project</p>
      <p>1 hr. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-check-circle text-success"></i>
    <div>
      <h4>Us</h4>
      <p>Project</p>
      <p>2 hrs. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-info-circle text-primary"></i>
    <div>
      <h4>we</h4>
      <p>Project</p>
      <p>4 hrs. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>
  <li class="dropdown-footer">
    <a href="#">Show all notifications</a>
  </li>

</ul><!-- End Notification Dropdown Items -->

</li><!-- End Notification Nav -->

<li class="nav-item dropdown">

<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
  <i class="bi bi-chat-left-text"></i>
  <span class="badge bg-success badge-number">3</span>
</a><!-- End Messages Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
  <li class="dropdown-header">
    You have 4 new messages
    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="#">
      <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Gilbert</h4>
        <p>Hurry for the project</p>
        <p>4 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="#">
      <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Mourisha</h4>
        <p>Hurry for the project</p>
        <p>4 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="#">
      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Bella</h4>
        <p>Hurry for the project</p>
        <p>6 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="message-item">
    <a href="#">
      <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
      <div>
        <h4>Denish</h4>
        <p>Hurry for the project</p>
        <p>8 hrs. ago</p>
      </div>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="dropdown-footer">
    <a href="#">Show all messages</a>
  </li>

</ul><!-- End Messages Dropdown Items -->

</li><!-- End Messages Nav -->

<li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
  <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
  <span class="d-none d-md-block dropdown-toggle ps-2">Simon Peter</span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6>Simon Peter</h6>
    <span>Admin</span>
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
        <a class="nav-link " href="admin_page.php">
        <i class="fa fa-home" aria-hidden="true"></i>
          <span>Admin Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
        <i class="fa fa-user" aria-hidden="true"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-doctors.php">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Doctors</span>
        </a>
      </li><!-- End Doctors Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-farmers.php">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Farmers</span>
        </a>
      </li><!-- End Farmers Page Nav -->

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

  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">                                
                  <h1>Appointments</h1>
                </div>
              </div><!-- End Page Title -->

              <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Appointment Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php 
                  while ($rows = mysqli_fetch_assoc($sql_query) ) {
                  ?>
                            <tr>
                                <td><?php   echo $rows['your_name']; ?></td>
                                <td><?php   echo $rows['appointment_Date']; ?></td>
                                <td><?php   echo $rows['appointment_Time']; ?></td>
                                <td><?php   echo $rows['appointment_Type']; ?></td>
                                <td><?php   echo $rows['appointment_Description']; ?></td>

                                <?php
                        // $userId = $rows['appointment_Id'];

                        include 'config.php';
                        $retreive1 = "SELECT * FROM  appointment ";
                        $sql_query1 = mysqli_query($conn, $retreive1);
                        $rows1 = mysqli_fetch_assoc($sql_query1);
                    ?>
                            </tr>
                            <?php   
                          } 
  
                           ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




              

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
    </div>
  </footer>End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
 <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
  <script src="assets/js/datatables.min.js"></script>
  <script src="assets/js/pdfmake.min.js"></script>
  <script src="assets/js/vfs_fonts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Verms Main JS File -->
  <script src="assets/js/main.js"></script>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
    $('#datatable').DataTable({});
  </script>

</body>

</html>