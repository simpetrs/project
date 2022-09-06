<?php
include_once "../header_doctor.php";
$user = $_SESSION['user_Id'];
?>
  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">                                
                  <h1>Doctor Dashboard</h1>
                    <?php
                    $query = mysqli_query($conn, "Select user_Id, (select count(appointment.id) from appointment left join payments on payments.appointment = appointment.id  where doctor = '$user' and payments.status = 1) as appointments, (select count(appointment.id) from appointment left join payments on payments.appointment = appointment.id  where doctor = '$user' and payments.status = 1 and appointment.status = 1) as approved, (select count(id) from messages where sender = '$user') as messages  from user where user_Id = '$user' limit 1") or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    ?>
                </div>
              </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Doctors Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Appointment requests</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6><?=$row['appointments']?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Doctors Card -->

            <!-- farmers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card farmer-card">

                <div class="card-body">
                  <h5 class="card-title">Appointment approved</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?=$row['approved']?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End farmers Card -->

            <!-- Reports Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card report-card">

                <div class="card-body">
                  <h5 class="card-title">Messages / Notes sent</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row['messages']?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Reports Card -->
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