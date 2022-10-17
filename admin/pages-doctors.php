

<?php
include_once "../admin_header.php";
// $userId1 = $_SESSION["userId1"];
$retreive = "SELECT * FROM user WHERE user_Type = 'doctor'";
$sql_query = mysqli_query($conn, $retreive);
?>


  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">                                
                  <h1>Doctors</h1>
                </div>
              </div><!-- End Page Title -->

              <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                  while ($rows = mysqli_fetch_assoc($sql_query) ) {
                  ?>
                            <tr>
                                <td><?php   echo $rows['user_Id']; ?></td>
                                <td><?php   echo $rows['name']; ?></td>
                                <td><?php   echo $rows['email']; ?></td>
                                <td><?php   echo $rows['phone']; ?></td>
                                <td><a href="./toggle-users.php?toggle=2&user=<?=$rows['user_Id']?>" onclick="return preventAction()"><button class="btn btn-warning">Drop</button></a> </td>
                                <?php
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
  
 <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/datatables.min.js"></script>
  <script src="assets/js/pdfmake.min.js"></script>
  <script src="assets/js/vfs_fonts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Verms Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>