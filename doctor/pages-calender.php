<?php
include_once  "../header_doctor.php";
?>
<main id="main" class="main">


    <!-- I Have to work on this page title tonight -->
    <div class="col-12">
        <div class="card">
            <div class="pagetitle">
                <h1>Calender</h1>
            </div>
        </div><!-- End Page Title -->

    </div>
    <div class="col-12">
        <div id='calendar'></div>
    </div>






</main><!-- End #main -->

<!-- ======= Footer ======= -->
<!-- <footer id="footer" class="footer">
  <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
  </div>
</footer>End Footer -->

<!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

<!-- Vendor JS Files -->
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });

</script>

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