<?php
include_once "../header.php";
?>
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                                <th></th>
                                <th>Doctor</th>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Urgency</th>
                                <th>Description</th>
                                <th>Date created</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($conn, "select id, doctor, _date, _time,(select status from payments where payments.appointment = appointment.id order by status desc limit 1) as payment, appointment, description, date_added, (select name from user where user_Id = doctor) as doctor_names from appointment where user = '" . $_SESSION['user_Id'] ."' order by id desc") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row['doctor_names']?></td>
                                <td><?=$row['_date']?></td>
                                <td><?=$row['_time']?></td>
                                <td><?=$row['appointment'] == 1 ? '<b>Critical <i class="fa fa-exclamation-triangle text-danger"></i></b>' : 'Normal'?></td>
                                <td><?=$row['description']?></td>
                                <td><?=$row['date_added']?></td>
                                <td><?=$row['payment'] == null ?'Pending<br/><button class="btn btn-outline-primary" onclick="makePayment(\'' . $row['id'] . '\', \'' . $row['doctor_names'] . '\')"><small>Complete Payment</small></button>' : ($row['payment'] == 1 ?'PAID' : "FAILED")?></td>
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
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Payments</h4>
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


<script>
    function makePayment(id, doctor) {
        let amount = 500
        let html = `
        <form method="post" action="payment.php" id="comment_form">
<p>Hello, by making this payment, you are completing your appointment to <b>` + doctor +` </b>
</p>
<b>Charge<b>
<input type='text' disabled value='UGX ` + amount + `' class='form-control rounded-0 mt-3'>
<input type='hidden' value="` + amount + `" name="amount" />
<b>Provide an Airtel or MTN number to be charged</b>
<input type='hidden' value='` + id +`' name='appointment'/>
<input type='text' name='phone' required class='form-control rounded-0 mt-3 mb-3' placeholder="in format 256705000000"/>
<button class='btn btn-primary form-control rounded-0' onclick="disableBtn()" id="btn">Submit</button>
</form>
        `
        $("#modal").html(html)
        $("#myModal").modal("toggle")
    }
</script>
  <script type="text/javascript">
    $('#datatable').DataTable({});
    function disableBtn() {
        $("#btn").hide()
    }
  </script>

</body>

</html>