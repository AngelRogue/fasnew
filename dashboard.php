<?php
require_once __DIR__ . '/assets/includes/config.php';
require_once __DIR__ . '/assets/includes/session.php';
requireLogin();
$user = currentUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <?php include 'assets/includes/css-link.php'; ?>
</head>

<body>

  <?php include 'assets/includes/dash-topnav.php'; ?>
  <!-- ======= Sidebar ======= -->
<!-- End Sidebar-->
<?php include 'assets/includes/dash-sidebar.php'; ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row d-flex flex-wrap justify-content-center"> 

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row justify-content-center">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">sub1 </h5>

                  <div class="d-flex align-items-center">
                    
                  </div>
                </div>

              </div>
            </div><!-- End sub1 Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">sub2 </h5>

                </div>

              </div>
            </div><!-- End sub2 Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">sub3 </h5>

                  

                </div>
              </div>

            </div><!-- End sub3 Card -->

           <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">sub4 </h5>

                  

                </div>
              </div>

            </div><!-- End sub4 Card -->

             <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">sub5 </h5>

                  

                </div>
              </div>
          

            </div>
            </div><!-- End sub4 Card -->

             <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">sub6 </h5>

                  

                </div>
              </div>
          

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>