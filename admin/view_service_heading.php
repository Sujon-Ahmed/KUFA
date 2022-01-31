<?php 
$page = "services";
$sub_page = "service";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_service_heading = "SELECT * FROM `services_heading`";
$select_service_heading_result = mysqli_query($db_connection, $select_service_heading);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">View-Service-Heading</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table" id="banners">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_service_heading_result as $heading){ ?>
                        <tr>
                            <td><?= $heading['service_heading_id'] ?></td>
                            <td><?= $heading['service_heading_sub_title'] ?></td>
                            <td><?= $heading['service_heading_title'] ?></td>
                            <td>
                                <?php if ($heading['service_heading_status'] == 0){ ?>
                                    <a href="ser_head_status_change.php?service_heading_id=<?= $heading['service_heading_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="ser_head_status_change.php?service_heading_id=<?= $heading['service_heading_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_ser_heading.php?service_heading_id=<?= $heading['service_heading_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_ser_heading.php?service_heading_id=<?= $heading['service_heading_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>