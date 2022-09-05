<?php
include_once  "../header_doctor.php";
?>

  <main id="main" class="main bg-white">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">  
                <h1>Messages</h1>                              
                </div>
              </div><!-- End Page Title -->
</div>
      <div class="col-12">
          <table class="table shadow table-striped">
              <thead>
              <tr>
                  <Th></Th>
                  <th>Receipt</th>
                  <th>Message</th>
                  <th>Date sent</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $no =1;
              $data = mysqli_query($conn, "select message, name, date_added from messages left join user on user.user_Id = messages.receiver where sender = '" .$_SESSION['user_Id']. "' order by id desc") or die(mysqli_error($conn));
              while ($rows = mysqli_fetch_array($data)) {
                  ?>
                  <tr>
                      <td><?=$no++?></td>
                      <td><?=$rows['name']?></td>
                      <td><?=$rows['message']?></td>
                      <td><?=$rows['date_added']?></td>
                  </tr>
              <?php
              }
              ?>
              </tbody>
          </table>
      </div>






              

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