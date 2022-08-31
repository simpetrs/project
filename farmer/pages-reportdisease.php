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


  <?php
if(isset($_POST['submit'])){

  $name = $_POST['your_name'];
  $location = $_POST['report_Area']; 
   $animal = $_POST['animal'];
  $desc= $_POST['disease_Description'];
    

include 'config.php'; 

$insert = "INSERT INTO report ( your_name, report_Area, animal, disease_Description) VALUES ('$name', '$location', '$animal', '$desc')";
$sql_query = mysqli_query($conn, $insert);
if ($sql_query == true){
  echo 'sucessful ';
}else{
  echo mysqli_error($conn);
}
} 
?>         
<!-- I Have to work on this page title tonight -->
<div class="col-12">
  <div class="card">
    <div class="pagetitle">                                
      <h1>Report Diseases</h1>
    </div>
  </div><!-- End Page Title -->
  <!-- <section class="h-100 bg-dark"> -->
  <!-- <div class="container py-5 h-100"> -->
    <!-- <div class="row d-flex justify-content-center align-items-center h-100"> -->
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="assets/img/animal.png "
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" width="100%"/>
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">REPORT DISEASES</h3>
                <form action="" method="post" >

                 <div class="form-outline mb-4">
                  <input type="text" id="form3Example1m" name="your_name" class="form-control form-control-lg" placeholder="Name"/>
                </div>
               
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example8" name="report_Area" class="form-control form-control-lg" placeholder="Location"/>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Animal: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['animal']=='Cow') { echo "checked"; } ?> class="form-check-input" type="checkbox" name="animal" id="Animal"
                      value="Cow" />
                    <label class="form-check-label" for="femaleGender">Cow</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['animal']=='Goat') { echo "checked"; } ?> class="form-check-input" type="checkbox" name="animal" id="Animal"
                      value="Goat" />
                    <label class="form-check-label" for="maleGender">Goat</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['animal']=='Sheep') { echo "checked"; } ?> class="form-check-input" type="checkbox" name="animal" id="Animal"
                      value="Sheep" />
                    <label class="form-check-label" for="maleGender">Sheep</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input <?php if (['animal']=='Pig') { echo "checked"; } ?> class="form-check-input" type="checkbox" name="animal" id="Animal"
                      value="Pig" />
                    <label class="form-check-label" for="maleGender">Pig</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input <?php if (['animal']=='Others') { echo "checked"; } ?> class="form-check-input" type="checkbox" name="animal" id="Animal"
                      value="Others" />
                    <label class="form-check-label" for="otherGender">Others</label>
                  </div>

                </div>

                <div class="form-outline mb-4">
                <textarea name="disease_Description" class="form-control" placeholder="Disease Description"></textarea>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" name="reset" class="btn btn-danger btn-lg">Reset all</button>
                  <button type="submit" name="submit" class="btn btn-primary btn-lg ms-2">Submit form</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
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