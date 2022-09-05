<?php
include_once "../header_doctor.php";
?>
  <main id="main" class="main">


<!-- I Have to work on this page title tonight -->
<div class="col-12">
              <div class="card">
                <div class="pagetitle">                                
                  <h1>Doctor Dashboard</h1>
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
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
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
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>264</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End farmers Card -->

            <!-- Reports Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card report-card">

                <div class="card-body">
                  <h5 class="card-title">Reports</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>44</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Reports Card -->

            <!-- Reported Diseases Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Reported Diseases</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>14</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Reported Diseases Card -->

            <!-- Appointments Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card doctor-card">

                <div class="card-body">
                  <h5 class="card-title">Appointments</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>4</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Appointments Card -->

            

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports</h5>

                  <!-- Line Chart             nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn-->
                  <div id="reportsChart"></div>
<!-- 
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- registered doctors -->
            <div class="col-12">
              <div class="card new-doctors overflow-auto">

                <div class="card-body">
                  <h5 class="card-title"></h5>

                </div>

              </div>
            </div><!-- End registered doctors -->


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
                          name: 'Appoitments'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Daily system usage -->


          <!-- News & Updates Traffic -->
          <div class="card">
          
            <div class="card-body pb-0">
              <h5 class="card-title">Emergencies</h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/.jpg" alt="">
                  <h4><a href="#">mmmmmmmmmm</a></h4>
                  <p>mmmmmmmmmmmmmmmmmmmmmmm</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/.jpg" alt="">
                  <h4><a href="#">mmmmmmmmmm</a></h4>
                  <p>mmmmmmmmmmmmmmmmmmmmmmm</p>
                </div>

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