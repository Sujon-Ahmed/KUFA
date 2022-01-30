<?php 
$page = "abouts";
$sub_page = "about";
require "admin_header.php";
require "database.php";
$about_id = $_GET['about_id'];
$select_abouts = "SELECT * FROM `abouts` WHERE `about_id` = $about_id";
$select_abouts_result = mysqli_query($db_connection, $select_abouts);
$after_assoc_about = mysqli_fetch_assoc($select_abouts_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Banners</li>
            <li class="breadcrumb-item active">Add-Banner</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Edit Banner</h4>
                    <div class="card-body">
                        <form action="about_update.php" method="POST" enctype="multipart/form-data">
                            <!-- sub title felid -->
                            <div class="mt-2">
                                <label for="sub_title" class="mb-1">Sub Title</label> 
                                <input type="text" name="sub_title" id="sub_title" value="<?= $after_assoc_about['about_sub_title'] ?>" class="form-control" >
                            </div>
                            <!-- title felid -->
                            <div class="mt-2">
                                <label for="title" class="mb-1">Title</label> 
                                <input type="text" name="title" value="<?= $after_assoc_about['about_title'] ?>" id="title" class="form-control" >
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="banner_image" class="mb-1">Image</label> 
                                <input type="file" name="file" id="banner_image" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <input type="hidden" name="old_img" value="<?= $after_assoc_about['about_image'] ?>">
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="description" class="mb-1">Description</label> 
                                <textarea name="description" id="banner_desc" cols="10" rows="5" class="form-control" ><?= $after_assoc_about['about_description'] ?></textarea>
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <input type="hidden" name="about_id" value="<?= $after_assoc_about['about_id'] ?>"  id="">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-primary text-center" style="border-bottom: 2px dashed #000;">Image Preview</h5>
                <img src="assets/uploads/abouts/<?= $after_assoc_about['about_image'] ?>" alt="" id="pic" class="img-fluid">
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>