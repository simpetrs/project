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
                    $query = mysqli_query($conn, "Select user_Id, (select count(appointment.id) from appointment left join payments on payments.appointment = appointment.id  where doctor = '$user' and payments.status = 1) as appointments, (select count(id) from animal_disease_cases where 1 limit 1) as cases, (select count(appointment.id) from appointment left join payments on payments.appointment = appointment.id  where doctor = '$user' and payments.status = 1 and appointment.status = 1) as approved, (select count(id) from messages where sender = '$user') as messages  from user where user_Id = '$user' limit 1") or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    ?>
                </div>
              </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

        <!-- Doctors Card -->
        <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Appointment requests</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="pages-appointments.php"><i class="bi bi-people"></i></a>
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
                      <a href=""><i class="bi bi-check-circle"></i></a>
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
                      <a href="pages-messages.php"><i class="bi bi-envelope-check"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row['messages']?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Reports Card -->

             <!-- Reports Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card report-card">

                <div class="card-body">
                  <h5 class="card-title">Cases Reported</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="pages-diseases.php"><i class="fa fa-bug" aria-hidden="true"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?=$row['cases']?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Reports Card -->
           
      </div>
    </section>
    <div class="container">
    <div class="row">        
            <div class="col-12">            
                    <div class="pagetitle"> 
                        <h1> Field Reports
                           
                        </h1>
                    </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                                <tr>
                                    <th></th>
                                    <th>Doctor</th>
                                    <th>Report Area</th>
                                    <th>Report Details</th>
                                    <th>Date Added</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = mysqli_query($conn, "select report_desc, report.date_time, report.report_area, (select name from user where user_Id = report.doctor) as doctor from report")or die(mysqli_error($conn));
                                    $no = 1;
                              
                  while ($rows = mysqli_fetch_array($query)) {
                  ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?= $rows['doctor']; ?></td>
                                                <td><?= $rows['report_area']; ?></td>
                                                <td><?= $rows['report_desc']; ?></td>
                                                <td><?= $rows['date_time']; ?></td>
                                                <td>
                                                  <button class="btn btn-success"><a href="download.php?note=<?php echo $rows['report_desc'] ?>">Download</a></button>
                                                </td>
                <?php
               $query2 = "SELECT * FROM report WHERE `id` = 'report_id'" or die(mysqli_error($conn));
               $run2 = mysqli_query($conn,$query2);
               
               while($rows = mysqli_fetch_assoc($run2)){
                   ?>
              
               <?php
               }
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

  <script  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="    crossorigin="anonymous"></script>
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
  
</body>

</html>