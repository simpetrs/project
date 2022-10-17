<?php
include_once "../header_doctor.php";
?>
  <main id="main" class="main">
<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">  
                <h1>Appointments</h1>
                    <?php
                    if (isset($_POST['submit'])) {
                        $message = trim($_POST['note']);
                        if(empty($message)) {

                        }else {
                            $date = date("Y-m-d");
                            $user = $_SESSION['user_Id'];
                            $id = $_POST['id'];
                            $status = $_POST['status'];
                            $farmer = mysqli_query($conn, "select user from appointment where id = '$id' and doctor = '" . $user . "' ") or die(mysqli_error($conn));
                            $farmer = mysqli_fetch_array($farmer);
                            $farmer = $farmer['user'];
                            mysqli_query($conn, "update appointment set status = '$status' where id = '$id' and doctor = '$user'") or die(mysqli_error($conn));
                            mysqli_query($conn, "insert into messages (date_added, sender, receiver, message, appointment) values('$date', '$user', '$farmer', '$message', '$id')") or die(mysqli_error($conn));
                            ?>
                            <div class="alert alert-success">Appointment status changed successfully</div>
                    <?php
                        }
                    }
                    ?>
                </div>
              </div><!-- End Page Title -->
              <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                                <th>Farmer</th>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Urgency</th>
                                <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody is="appointments">
                  <?php
                  $data = mysqli_query($conn, "select name, appointment.status, appointment.appointment, appointment.id, _time, _date, appointment.date_added, appointment.description, location from appointment left join payments on payments.appointment = appointment.id left join user on user.user_Id = appointment.user where appointment.doctor = '" . $_SESSION['user_Id'] . "' and payments.status = 1") or die(mysqli_error($conn));
                  $no = 1;
                  while ($rows = mysqli_fetch_array($data)) {
                  ?>
             
                      <tr>
                          <td><?=$no++?></td>
                          <td><?=$rows['name']?></td>
                          <Td><?=$rows['_date']?></Td>
                          <Td><?=$rows['_time']?></Td>
                          <td><?=$rows['appointment'] == 1 ? '<b>Critical <i class="fa fa-exclamation-triangle text-danger"></i></b>' : 'Normal'?></td>
                          <td><?=$rows['description']?></td>
                          <td><?=$rows['location']?></td>
                          <td ><?php
                              if ($rows['status'] == 0) {
                                  ?>
                                  <button class="btn btn-primary" onclick="approveAppoinment('<?=$rows['id']?>', '<?=$rows['name']?>')">Approve</button>
                                      <?php
                              }else
                              {
                                  ?>
                                  <?=$rows['status'] == 1 ? '<span class="badge bg-success">Approved</span>': '<span class="badge bg-danger">Rejected</span>'?>
                                  <button class="btn btn-primary" onclick="approveAppoinment('<?=$rows['id']?>', '<?=$rows['name']?>')">Update status</button>
                              <?php
                              }
                              ?>
                          </td>
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

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Appointment approval</h4>
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
    function approveAppoinment(id, names) {
        let html = `
<form action='' method='post'>
            Hello, you are changing status to this appointment from <b>` + names + `</b>
<br/>
<br/>
<input type='hidden' name='id' value='` + id +`'/>
Mark Appointment <select class='form-control' name='status'><option value='0'>Pending</option><option value='1'>Approved</option><option value='2'>Rejected</option></select>
<b>Message</b>
<div class='alert alert-info'>Add a note for your status update. It will be seen by the Farmer</div>
<textarea class='form-control' required name='note' placeholder="Notes"></textarea>
<input type='submit' name='submit' value='Update Status' class='form-control btn btn-primary mt-3'>
</form>
        `
        $("#modal").html(html)
        $("#myModal").modal("toggle")
    }
</Script>
  

</body>

</html>