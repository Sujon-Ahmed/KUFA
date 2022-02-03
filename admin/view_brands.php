<?php 
$page = "brands";
$sub_page = "brand";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_brands = "SELECT * FROM `brands`";
$select_result = mysqli_query($db_connection, $select_brands);

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Brands</li>
            <li class="breadcrumb-item active">View-Brand</li>
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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_result as $brand){ ?>
                        <tr>
                            <td><?= $brand['id'] ?></td>
                            <td><img src="assets/uploads/brands/<?= $brand['image'] ?>" width="100" class="img-fluid" alt=""></td>
                            <td>
                                <?php if ($brand['status'] == 0){ ?>
                                    <a href="brand_status_change.php?id=<?= $brand['id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="brand_status_change.php?id=<?= $brand['id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_brand.php?id=<?= $brand['id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_brand.php?id=<?= $brand['id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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