<?php
include_once "../header.php";
?>
  <main id="main" class="main">


  <?php
if(isset($_POST['submit'])){
    //print_r($_POST);
    $user = $_SESSION['user_Id'];
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $date = date("Y-m-d");
    $animal = $_POST['animal'];
    if (empty($description) or empty($location)) {
    ?>
        <div class="alert alert-warning">Disease description and Location should be provided.</div>
    <?php
    }
    else{

        $insert = "INSERT INTO animal_disease_cases (disease_case, animal, location, date_added, user) 
        VALUES ('$description', '$animal', '$location', '$date', '$user')";
        $sql_query = mysqli_query($conn, $insert);
        if ($sql_query == true){
            ?>
            <div class="alert alert-success">Your submission has been successful.We shall contact you when findings are made.</div>

            <?php
        }else{
            echo mysqli_error($conn);
        }
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
<!--            <div class="col-xl-12 d-none d-xl-block">-->
<!--              <img src="assets/img/animal.png "-->
<!--                alt="Sample photo" class="img-fluid"-->
<!--                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" width="100%"/>-->
<!--            </div>-->
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">REPORT DISEASES</h3>
                <form action="" method="post" >
                  <h6 class="mb-0 me-4 mb-4">Animal: </h6>
                    <select class="form-control" name="animal">
                        <?php
                        $animals = mysqli_query($conn, "select id, animal from animals order by animal asc") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($animals)) {
                            ?>
                                <option value="<?=$row['id']?>" ><?=$row['animal']?></option>
                            <?php
                        }
                        ?>
                    </select>
                <div class="form-outline mb-4 mt-4">
                    <h6>Disease Description</h6>
                    <div class="alert alert-info">
                        The description should include symptoms, duration it has taken and possible first aid rendered with results to such aid on the specific animals reported.
                    </div>
                <textarea name="description" class="form-control" placeholder="Disease Description"></textarea>
                </div>
                    <div class="form-outline mb-4 mt-4">
                        <h6>Where are you reporting from?</h6>
                        <input type="text" id="form3Example8" name="location" class="form-control form-control-lg" placeholder="Location"/>
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