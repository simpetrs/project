<?php
include_once "../admin_header.php";
?>
<main id="main" class="main">


    <!-- I Have to work on this page title tonight -->
    <div class="col-12">
        <div class="card">
            <div class="pagetitle">
                <h1>Notifications</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Payments</h1>
                    <ul class="notifications list-group">
                        <?php
                        $data = mysqli_query($conn, "select name, date_added, amount from payments left join user on user.user_Id = payments.user where status = 1")
                        ?>

                        <?php
                        while($row = mysqli_fetch_array($data)) {
                            ?>
                            <li class="list-group-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Payment</h4>
                                    <p>Amount of <?=$row['amount']?> has been paid for an appointment from <?=$row['name']?></p>
                                    <p><?=$row['date_added']?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul><!-- End Notification Dropdown Items -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>

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
        let amount = 1000
        let html = `
        <form method="post" action="payment.php" >
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