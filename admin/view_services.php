<?php 
$page = "services";
$sub_page = "service";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_services = "SELECT * FROM `services`";
$select_services_result = mysqli_query($db_connection, $select_services);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">View-Services</li>
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
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_services_result as $service){ ?>
                        <tr>
                            <td><?= $service['service_id'] ?></td>
                            <td><i class="<?= $service['service_icon'] ?>"></i></td>
                            <td><?= $service['service_title'] ?></td>
                            <td><?= $service['service_description'] ?></td>
                            <td>
                                <?php if ($service['service_status'] == 0){ ?>
                                    <a href="service_status_change.php?service_id=<?= $service['service_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="service_status_change.php?service_id=<?= $service['service_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_service.php?service_id=<?= $service['service_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_service.php?service_id=<?= $service['service_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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