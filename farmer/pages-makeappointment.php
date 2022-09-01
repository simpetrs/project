<?php
include_once "../header.php";
?>
  <main id="main" class="main">


<div class="col-12">
  <div class="card">
    <div class="pagetitle">                                
      <h1>Make Appointment</h1>
    </div>
  </div><!-- End Page Title -->

  <?php
if(isset($_POST['submit'])){
  $doctor = $_POST['doctor'];
  $user = $_SESSION['user_Id'];
  $location = $_POST['your_location']; 
  $appType = $_POST['appointment_Type'];
  $date = $_POST['appointment_Date'];
  $time = $_POST['appointment_Time'];
  $desc= $_POST['appointment_Description'];
$insert = "INSERT INTO appointment (user, location, appointment, _date, _time, description, doctor, date_added) VALUES ('$user', '$location', '$appType', '$date', '$time', '$desc', '$doctor', '" . date("Y-m-d") . "')";
$sql_query = mysqli_query($conn, $insert);
if ($sql_query == true){
  echo "<div class='alert alert-info'>Successfully Made appointment</div>";
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
                    <?php
                    $doctors = mysqli_query($conn, "select * from user where user_type = 'doctor' order by name asc");
                    ?>
                <div class="form-outline mb-4">
                    <h6>Select Doctor</h6>
                    <select class="form-control" name="doctor">
                        <?php
                        while ($row = mysqli_fetch_array($doctors)) {
                            ?>
                            <option value="<?=$row['user_Id']?>"><?=$row['name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <h6>Where are you located?</h6>
                  <input type="text" id="form3Example8" name="your_location" class="form-control form-control-lg" placeholder="Location"/>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Appointment Type: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input type="radio" class="form-check-input"  name="appointment_Type" id="app" value="1" />
                    <label class="form-check-label" for="emergency">Emergency</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input type="radio" class="form-check-input"  name="appointment_Type" id="app"
                      value="2" />
                    <label class="form-check-label" for="not_emergency">Not Emergency</label>
                  </div>

                </div>

                <div class="form-outline mb-4">
                <textarea class="form-control" placeholder="Disease Description" name="appointment_Description"></textarea>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                      <h6>Date of appointment</h6>
                    <div class="form-outline">
                      <input type="date" id="form3Example1m" class="form-control form-control-lg" name="appointment_Date"/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                      <h6>Time Of appointment</h6>
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