<?php 
$page = "banners";
$sub_page = "banner.php";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_banners = "SELECT * FROM `banners`";
$select_banners_result = mysqli_query($db_connection, $select_banners);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Banners</li>
            <li class="breadcrumb-item active">View-Banner</li>
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
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_banners_result as $banner){ ?>
                        <tr>
                            <td><?= $banner['banner_id'] ?></td>
                            <td><?= $banner['banner_sub_title'] ?></td>
                            <td><?= $banner['banner_title'] ?></td>
                            <td><img src="assets/uploads/banners/<?= $banner['banner_img'] ?>" width="100" class="img-fluid" alt=""></td>
                            <td><?= $banner['description'] ?></td>
                            <td>
                                <?php if ($banner['banner_status'] == 0){ ?>
                                    <a href="banner_status_change.php?id=<?= $banner['banner_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="banner_status_change.php?id=<?= $banner['banner_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_banner.php?banner_id=<?= $banner['banner_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_banner.php?banner_id=<?= $banner['banner_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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