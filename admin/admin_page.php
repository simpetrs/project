<?php
include_once "../admin_header.php";
//include_once "../config.php";
?>

<?php
//count doctors
$select = "SELECT * FROM user WHERE user_Type='doctor'";
$sql_query = mysqli_query($conn, $select);
$countdoc = mysqli_num_rows($sql_query);

//count farmers
$select1 = "SELECT * FROM user WHERE user_Type='farmer'";
$sql_query1 = mysqli_query($conn, $select1);
$countfar = mysqli_num_rows($sql_query1);


//count appointment
$select4 = "SELECT * FROM appointment";
$sql_query4 = mysqli_query($conn, $select4);
$countapp = mysqli_num_rows($sql_query4);

$report = mysqli_query($conn, "select user_Id, (select count(id) from payments  where status = 1 limit 1) as payments, (select count(id) from animal_disease_cases where 1 limit 1) as cases, (select count(id) from appointment where 1 limit 1) as appointments from user where 1 limit 1") or die(mysqli_error($conn));
$row = mysqli_fetch_array($report);


 ?>


  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">                                
                  <h1>Admin Dashboard</h1>
                </div>
              </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

         <!-- Doctors Card -->
         <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Doctors</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="pages-doctors.php"><i class="fa fa-briefcase" aria-hidden="true"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $countdoc; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Doctors Card -->

            <!-- farmers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card farmer-card">

                <div class="card-body">
                  <h5 class="card-title">Farmers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="pages-farmers.php"><i class="fa fa-users" aria-hidden="true"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $countfar; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End farmers Card -->

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

            <!-- Payment Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Payments</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="payments.php"><i class="fa fa-money" aria-hidden="true"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row['payments']; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Payment Card -->

            <!-- Appointments Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Appointments</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <a href="pages-appointments.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row['appointments']; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Appointments Card -->

             <!-- Reported diseases Card
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Reported Diseases</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $countdis; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>End Appointments Card -->

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
                                                  <button class="btn btn-success"><a href="download.php">Download</a></button>
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
        </div>
            



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Daily system usage -->
          <div class="card">
            
            <div class="card-body pb-0">
              <h5 class="card-title">System Activities</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Notifications'
                        },
                        {
                          value: 735,
                          name: 'Reports'
                        },
                        {
                          value: 580,
                          name: 'Online Doctors'
                        },
                        {
                          value: 484,
                          name: 'Online Farmers'
                        },
                        {
                          value: 300,
                          name: 'Appointments'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Daily system usage -->


          <!-- News & Updates outbreaks -->
          <div class="card">
          
            <div class="card-body pb-0">
              <h5 class="card-title">Emergencies</h5>

              <div class="news row">
                  <?php
                  $data = mysqli_query($conn, "select disease_case, animal_disease_cases.date_added, animal_disease_cases.location,animal_disease_cases.date_added, (select animal from animals where id = animal_disease_cases.animal) as animal, (select name from user where user_Id = animal_disease_cases.user) as farmer from animal_disease_cases order by id desc limit 5") or die(mysqli_error($conn));
                  while ($row = mysqli_fetch_array($data)) {
                      ?>
                      <div class="col-md-12 border-0 border-bottom border-secondary mb-2">
                          <small>
                              <?=$row['disease_case']?> >> <?=$row['date_added']?> from <?=$row['farmer']?>
                          </small>
                      </div>
                  <?php
                  }
                  ?>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End New diseases -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
    </div>
  </footer>End Footer -->

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