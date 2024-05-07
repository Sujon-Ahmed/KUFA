<?php
$page = "dashboard";
require "database.php";
require "admin_header.php";
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['user_id'];
// TODO: user skills 
$sql = "SELECT COUNT(*) AS total_skills FROM `skills` WHERE `user_id` = $user_id";
$result  = mysqli_query($db_connection, $sql);
$row = mysqli_fetch_assoc($result);
$skills = $row['total_skills'];
mysqli_free_result($result);

// TODO: user services
$sql = "SELECT COUNT(*) AS total_services FROM `services` WHERE `user_id` = $user_id";
$result  = mysqli_query($db_connection, $sql);
$row = mysqli_fetch_assoc($result);
$services = $row['total_services'];
mysqli_free_result($result);

// TODO: user portfolios
$sql = "SELECT COUNT(*) AS total_portfolios FROM `portfolios` WHERE `user_id` = $user_id";
$result  = mysqli_query($db_connection, $sql);
$row = mysqli_fetch_assoc($result);
$portfolios = $row['total_portfolios'];
mysqli_free_result($result);


?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Total Skills -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card">
              <div class="card-body p-3">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-tools"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $skills ?></h6>
                    <span class="text-success small pt-1 fw-bold">Total Skills</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total Services -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card">
              <div class="card-body p-3">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $services ?></h6>
                    <span class="text-success small pt-1 fw-bold">Total Services</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total Portfolio -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card">
              <div class="card-body p-3">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $portfolios ?></h6>
                    <span class="text-success small pt-1 fw-bold">Total Portfoilo</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php require "admin_footer.php" ?>