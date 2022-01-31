<?php 
$page = "abouts";
$sub_page = "about";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_abouts = "SELECT * FROM `abouts`";
$select_abouts_result = mysqli_query($db_connection, $select_abouts);
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
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_abouts_result as $about){ ?>
                        <tr>
                            <td><?= $about['about_id'] ?></td>
                            <td><?= $about['about_sub_title'] ?></td>
                            <td><?= $about['about_title'] ?></td>
                            <td><img src="assets/uploads/abouts/<?= $about['about_image'] ?>" width="100" class="img-fluid" alt=""></td>
                            <td><?= $about['about_description'] ?></td>
                            <td>
                                <?php if ($about['about_status'] == 0){ ?>
                                    <a href="about_status_change.php?id=<?= $about['about_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="about_status_change.php?id=<?= $about['about_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_about.php?about_id=<?= $about['about_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_about.php?about_id=<?= $about['about_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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