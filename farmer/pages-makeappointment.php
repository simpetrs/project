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

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Sabella</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Sabella</h6>
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
        <i class="fa fa-usd" aria-hidden="true"></i>
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
            <i class="fa fa-bug" aria-hidden="true"></i><span>Report Disease</span>
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

  <main id="main" class="main">


<div class="col-12">
  <div class="card">
    <div class="pagetitle">                                
      <h1>Make Appointment</h1>
    </div>
  </div><!-- End Page Title -->

  <?php
if(isset($_POST['submit'])){

  $name = $_POST['your_name'];
  $location = $_POST['your_location']; 
  $appType = $_POST['appointment_Type'];
  $date = $_POST['appointment_Date'];
  $time = $_POST['appointment_Time'];
  $desc= $_POST['appointment_Description'];
    

include 'config.php'; 

$insert = "INSERT INTO appointment ( your_name, your_location, appointment_Type, appointment_Date, appointment_Time, appointment_Description) VALUES ('$name', '$location', '$appType', '$date', '$time', '$desc')";
$sql_query = mysqli_query($conn, $insert);
if ($sql_query == true){
  echo 'sucessful ';
}else{
  echo mysqli_error($conn);
}
} 
?>         
      <div class="col">
    
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">MAKE APPOINTMENT</h3>
                <form action="" method="post" >
                
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1m" name="your_name" class="form-control form-control-lg" placeholder="Name"/>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example8" name="your_location" class="form-control form-control-lg" placeholder="Location"/>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Appointment Type: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['appointment_Type']=='Emergency') { echo "checked"; } ?> class="form-check-input" type="radio" name="appointment_Type" id="app"
                      value="Emergency" />
                    <label class="form-check-label" for="emergency">Emergency</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['appointment_Type']=='Not Emergency') { echo "checked"; } ?> class="form-check-input" type="radio" name="appointment_Type" id="app"
                      value="Not Emergency" />
                    <label class="form-check-label" for="not_emergency">Not Emergency</label>
                  </div>

                </div>

                <div class="form-outline mb-4">
                <textarea class="form-control" placeholder="Disease Description" name="appointment_Description"></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="date" id="form3Example1m" class="form-control form-control-lg" name="appointment_Date"/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="time" id="form3Example1n" class="form-control form-control-lg" name="appointment_Time"/>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" name="reset" class="btn btn-danger btn-lg">Reset all</button>
                  <button type="submit" name="submit" class="btn btn-primary btn-lg ms-2">Submit form</button>
                </div>
              </form>
              
            </div>
            </div>
          </div>
        
</section>

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

  <!-- Verms Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>