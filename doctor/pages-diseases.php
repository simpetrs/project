<?php
include_once "../header_doctor.php";
?>

  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">  
                <h1>Reported Diseases</h1>                              
                </div>
              </div><!-- End Page Title -->
      
              <?php
if(isset($_POST['submit'])){
  $area = $_POST['area'];
  $date = date("Y-m-d");
  $user = $_SESSION['user_Id'];
  $note = $_POST['note']; 
  $path = "files/".$note;
$insert = "INSERT INTO report (report_area, date_time, report_desc, doctor) VALUES ('$area', '". date("Y-m-d") . "', '$note', '$user')" or die(mysqli_error($conn));
$sql_query = mysqli_query($conn, $insert);
if ($sql_query == true){
  echo "<div class='alert alert-info'>Successfully Added a Field Report</div>";
}else{
  echo mysqli_error($conn);
}
} 
?>         


              <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th></th>
                                <th>From Farmer</th>
                                <th>Location</th>
                                <th>Animal Type</th>
                                <th>Case outbreak</th>
                            <th>Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php
                  $no = 1;
                  $data = mysqli_query($conn, "select disease_case, animal_disease_cases.date_added, animal_disease_cases.location,animal_disease_cases.date_added, (select animal from animals where id = animal_disease_cases.animal) as animal, (select name from user where user_Id = animal_disease_cases.user) as farmer from animal_disease_cases order by id desc") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['farmer']?></td>
                                <td><?=$row['location']?></td>
                                <td><?=$row['animal']?></td>
                                <td><?=$row['disease_case']?></td>
                                <td><?=$row['date_added']?></td>
                                <td><button class="btn btn-primary float-end " onclick="addreport()">Report</button></td>
                            </tr>
                  <?php
                        }
                           ?>  
                        </tbody>
                    </table>
                </div>
            </div> 




              

  </main><!-- End #main -->

  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Attach Field Report</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body p-4" id="modal">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
    </div>
  </footer>End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
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

  <script src="assets/js/datatables.min.js"></script>
  <script src="assets/js/pdfmake.min.js"></script>
  <script src="assets/js/vfs_fonts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Verms Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
<script type="text/javascript">
    $('#datatable').DataTable({});
</script>

<Script>
    function addreport() {
        let html = `
<form action='' method='post'>
            Hello, you are adding a treatment report from the field!
<br/>
<br/>
<textarea class='form-control' name='not' placeholder="Add Notes"></textarea><br/>
<div class="form-outline mb-4">
  <h6>Please fill in the reporting area</h6>
   <input type="text" id="form3Example8" name="area" class="form-control form-control-lg" placeholder="Reporting Area" required/>
 </div>
<div class='alert alert-info'>Upload a field report file. It will be seen by the all doctors</div><br/>
<input type="file" name="note" id="fileToUpload">
<input type='submit' name='submit' value='Upload Report' class='form-control btn btn-primary mt-3'>
</form>
        `
        $("#modal").html(html)
        $("#myModal").modal("toggle")
        $('.file-upload').file_upload();
        
    }
</Script>
</html>