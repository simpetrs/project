<?php
include_once "../header.php";
?>
<main id="main" class="main">
<!-- I Have to work on this page title tonight -->
<div class="col-12">
  <div class="card">
    <div class="pagetitle">
    <h1>Payments</h1>
        <?php
        if(isset($_GET['status'])) {
            ?>
            <div class="alert alert-info"><?=$_GET['message']?></div>
        <?php
        }
        ?>
    </div>
</div><!-- End Page Title -->
<div class="col-12 bg-white p-4">
    <div class="table-responsive">
        <table class="table shadow p-3" id="datatable">
            <thead>
            <tr>
                <th></th>
                <th>Appointment</th>
                <th>Doctor</th>
                <th style="width:50px">Ref</th>
                <th>Amount</th>
                <th>Date Added</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            $data = mysqli_query($conn ,"select amount,receipt, appointment,date_added, status, (select name from user where user_Id = (select doctor from appointment where id = payments.appointment)) as doctor from  payments where user = '" . $_SESSION['user_Id'] ."'") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_array($data)) {
                ?>
                <tr class="<?=($row['status'] == 0 ? '' : ($row['status'] == 1 ? 'bg-success text-white' : 'bg-danger text-white'))?>">
                    <td><?=$i++?></td>
                    <td><?=$row['appointment']?></td>
                    <td><?=$row['doctor']?></td>
                    <td class="text-truncate"><?=$row['receipt']?></td>
                    <td><?=number_format($row['amount'])?></td>
                    <td><?=$row['date_added']?></td>
                    <td><?=($row['status'] == 0 ? 'Pending' : ($row['status'] == 1 ? 'Completed' : 'Failed'))?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

</div>


              

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
    </div>
  </footer>End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/pdfmake.min.js"></script>
<script src="assets/js/vfs_fonts.js"></script>
<script src="assets/js/custom.js"></script>

  <!-- Verms Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
    $('#datatable').DataTable({});
</script>
</body>

</html>