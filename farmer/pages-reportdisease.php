<?php
include_once "../header.php";
?>
  <main id="main" class="main">


  <?php
if(isset($_POST['submit'])){

  $name = $_POST['your_name'];
  $location = $_POST['report_Area']; 
   $animal = $_POST['animal'];
  $desc= $_POST['disease_Description'];
  print_r($_POST);
die();

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
                    <input  class="form-check-input" type="checkbox" name="animal[]" id="Animal"
                      value="Cow" />
                    <label class="form-check-label" for="femaleGender">Cow</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input  class="form-check-input" type="checkbox" name="animal[]" id="Animal"
                      value="Goat" />
                    <label class="form-check-label" for="maleGender">Goat</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input  class="form-check-input" type="checkbox" name="animal[]" id="Animal"
                      value="Sheep" />
                    <label class="form-check-label" for="maleGender">Sheep</label>
                  </div>
                    <div class="">

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