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
  <style>
    .info-card {
      border: none;
      border-radius: 20px;
      padding: 25px;
      color: #fff;
      transition: all 0.3s ease;
      cursor: pointer;
      height: 160px;
    }

    .info-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
      width: 65px;
      height: 65px;
      background-color: rgba(255, 255, 255, 0.25);
      font-size: 32px;
    }

    .info-card h5 {
      margin-bottom: 4px;
      font-weight: 600;
    }

    .info-card p {
      font-size: 0.9rem;
      opacity: 0.9;
    }

    /* === Color themes === */
    .card-1 {
      background: linear-gradient(135deg, #007bff, #00b4ff);
    }

    .card-2 {
      background: linear-gradient(135deg, #28a745, #63e6be);
    }

    .card-5 {
      background: linear-gradient(135deg, #ffc107, #ffda6a);
      color: #333;
    }

    .card-4 {
      background: linear-gradient(135deg, #e83e8c, #ff77c2);
    }

    .card-3 {
      background: linear-gradient(135deg, #6610f2, #a070ff);
    }

    .card-6 {
      background: linear-gradient(135deg, #fd7e14, #ffb067);
    }

    /* Clickable cards */
    .card-link {
      text-decoration: none;
      color: inherit;
    }

    .card-link:hover {
      text-decoration: none;
      color: inherit;
    }

    #allcard {
      display: flex;
      flex-wrap: nowrap;
      flex-direction: row;
    }
  </style>
  <?php include 'assets/includes/css-link.php'; ?>
</head>

<body>

  <?php include 'assets/includes/dash-topnav.php'; ?>
  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
  <?php include 'assets/includes/dash-sidebar.php'; ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lecture Notes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Test Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row d-flex flex-nowrap flex-row justify-content-center">

       
        
      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include 'assets/includes/js-link.php'; ?>

</body>

</html>