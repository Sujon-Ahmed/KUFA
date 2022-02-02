<?php 
$page = "testimonials";
$sub_page = "testimonial";
require "database.php";
require "admin_header.php";

$select_headings = "SELECT * FROM `testimonial_head`";
$heading_result = mysqli_query($db_connection, $select_headings);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Abouts</li>
            <li class="breadcrumb-item active">View-About</li>
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
                            <th>Sub Heading</th>
                            <th>Heading</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($heading_result as $heading){ ?>
                        <tr>
                            <td><?= $heading['id'] ?></td>
                            <td><?= $heading['sub_title'] ?></td>
                            <td><?= $heading['main_title'] ?></td>
                            <td>
                                <?php if ($heading['status'] == 0){ ?>
                                    <a href="testimonial_status_change.php?id=<?= $heading['id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="testimonial_status_change.php?id=<?= $heading['id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_testimonial_heading.php?id=<?= $heading['id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_testimonial_heading.phpid=<?= $heading['id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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