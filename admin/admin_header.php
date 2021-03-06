<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}
require "database.php";
include "flash_data.php";
$user_id = $_SESSION['user_id'];
$select_users = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
$select_users_result = mysqli_query($db_connection, $select_users);
$after_assoc_user = mysqli_fetch_assoc($select_users_result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <!-- fontAwesome 4 cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- toastr css cdn liink -->
  <link rel="stylesheet" href="assets/css/toastr.css">
  <!-- summernote cdn link -->
  <link rel="stylesheet" href="summernote/summernote-bs4.min.css">
  <!-- dataTable cdn link -->
  <link rel="stylesheet" href="dataTable/dataTables.bootstrap4.min.css">
  
 
 
 
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <?php 
            if (!empty($after_assoc_user['user_photo'])) { ?>
                <img src="assets/uploads/users/<?= $after_assoc_user['user_photo'] ?>" alt="Profile" class="rounded-circle">
            <?php } else { ?>
                <img src="assets/img/avatar.png" alt="Profile" class="rounded-circle">
            <?php } ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $after_assoc_user ['user_name'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $after_assoc_user ['user_name'] ?></h6>
              <span><?=  $after_assoc_user ['user_job'] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a onclick="javascript:return confirm('Are You Sure Logout Dashboard?')" class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= ($page == "dashboard") ? '' : 'collapsed' ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <!-- user navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "users") ? '' : 'collapsed' ?>" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content <?= ($sub_page == "user") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="view_users.php">
              <i class="bi bi-circle"></i><span>View Users</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End user Nav -->
      <!-- banner navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "banners") ? '' : 'collapsed' ?>" data-bs-target="#banners-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Banners</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="banners-nav" class="nav-content <?= ($sub_page == "banner") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_banner.php">
              <i class="bi bi-circle"></i><span>Add Banner</span>
            </a>
          </li>
          <li>
            <a href="view_banner.php">
              <i class="bi bi-circle"></i><span>View Banner</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End banner Nav -->
      <!-- about navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "abouts") ? '' : 'collapsed' ?>" data-bs-target="#about-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-person"></i><span>About Us</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="about-nav" class="nav-content <?= ($sub_page == "about") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_about.php">
              <i class="bi bi-circle"></i><span>Add About</span>
            </a>
          </li>
          <li>
            <a href="view_about.php">
              <i class="bi bi-circle"></i><span>View About</span>
            </a>
          </li>
          <li>
            <a href="add_skill.php">
              <i class="bi bi-circle"></i><span>Add Skill</span>
            </a>
          </li>
          <li>
            <a href="view_skill.php">
              <i class="bi bi-circle"></i><span>View Skill</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End about Nav -->
      <!-- service navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "services") ? '' : 'collapsed' ?>" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-checklist"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content <?= ($sub_page == "service") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_service.php">
              <i class="bi bi-circle"></i><span>Add Service</span>
            </a>
          </li>
          <li>
            <a href="view_services.php">
              <i class="bi bi-circle"></i><span>View Services</span>
            </a>
          </li>
          <li>
            <a href="add_service_heading.php">
              <i class="bi bi-circle"></i><span>Add Heading</span>
            </a>
          </li>
          <li>
            <a href="view_service_heading.php">
              <i class="bi bi-circle"></i><span>View Heading</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End service Nav -->
      <!-- portfolio navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "portfolios") ? '' : 'collapsed' ?>" data-bs-target="#portfolio-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-bounding-box"></i><span>Portfolio</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="portfolio-nav" class="nav-content <?= ($sub_page == "portfolio") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_portfolio.php">
              <i class="bi bi-circle"></i><span>Add Portfolio</span>
            </a>
          </li>
          <li>
            <a href="view_portfolio.php">
              <i class="bi bi-circle"></i><span>View Portfolio</span>
            </a>
          </li>
          <li>
            <a href="add_heading.php">
              <i class="bi bi-circle"></i><span>Add Heading</span>
            </a>
          </li>
          <li>
            <a href="view_heading.php">
              <i class="bi bi-circle"></i><span>View Heading</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End portfolio Nav -->
      <!-- satisfy navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "satisfied") ? '' : 'collapsed' ?>" data-bs-target="#satisfy-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-emoji-smile"></i><span>Satisfy</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="satisfy-nav" class="nav-content <?= ($sub_page == "satisfy") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_satisfy.php">
              <i class="bi bi-circle"></i><span>Add Satisfy</span>
            </a>
          </li>
          <li>
            <a href="view_satisfy.php">
              <i class="bi bi-circle"></i><span>View Satisfy</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End satisfy Nav -->
      <!-- testimonial navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "testimonials") ? '' : 'collapsed' ?>" data-bs-target="#testimonial-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-chat-left-dots-fill"></i><span>Testimonial</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="testimonial-nav" class="nav-content <?= ($sub_page == "testimonial") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_testimonial_heading.php">
              <i class="bi bi-circle"></i><span>Add Heading</span>
            </a>
          </li>
          <li>
            <a href="view_testimonial_heading.php">
              <i class="bi bi-circle"></i><span>View Heading</span>
            </a>
          </li>
          <li>
            <a href="add_testimonial.php">
              <i class="bi bi-circle"></i><span>Add Testimonial</span>
            </a>
          </li>
          <li>
            <a href="view_testimonial.php">
              <i class="bi bi-circle"></i><span>View Testimonial</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End testimonial Nav -->
      <!-- brands navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "brands") ? '' : 'collapsed' ?>" data-bs-target="#brands-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Brands</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="brands-nav" class="nav-content <?= ($sub_page == "brand") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_brand.php">
              <i class="bi bi-circle"></i><span>Add Brand</span>
            </a>
          </li>
          <li>
            <a href="view_brands.php">
              <i class="bi bi-circle"></i><span>View Brands</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End brands Nav -->
      <!-- message navbar -->
      <li class="nav-item">
        <a class="nav-link <?= ($page == "messages") ? '' : 'collapsed' ?>" data-bs-target="#messages-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-fill"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="messages-nav" class="nav-content <?= ($sub_page == "message") ? '' : 'collapse' ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="view_messages.php">
              <i class="bi bi-circle"></i><span>View Messages</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End message Nav -->
    </ul>

  </aside><!-- End Sidebar-->