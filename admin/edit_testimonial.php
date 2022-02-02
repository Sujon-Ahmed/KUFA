<?php 
$page = "testimonials";
$sub_page = "testimonial";
require "admin_header.php";
require "database.php";
$id = $_GET['id'];
$select_testimonials = "SELECT * FROM `testimonials` WHERE `id` = $id";
$testimonial_result = mysqli_query($db_connection, $select_testimonials);
$after_assoc = mysqli_fetch_assoc($testimonial_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Testimonials</li>
            <li class="breadcrumb-item active">Add-Testimonial</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Testimonial</h4>
                    <div class="card-body">
                        <form action="testimonial_update.php" method="POST" enctype="multipart/form-data">
                            <!-- sub title felid -->
                            <div class="mt-2">
                                <label for="name" class="mb-1">Name</label> 
                                <input type="text" name="name" value="<?= $after_assoc['name'] ?>" id="name" class="form-control" >
                            </div>
                            <!-- title felid -->
                            <div class="mt-2">
                                <label for="designation" class="mb-1">Designation</label> 
                                <input type="text" name="designation" value="<?= $after_assoc['designation'] ?>" id="designation" class="form-control" >
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="about_image" class="mb-1">Image</label> 
                                <input type="file" name="file" id="about_image" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <input type="hidden" name="old_image" value="<?= $after_assoc['image'] ?>" id="">
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="description" class="mb-1">Quotes</label> 
                                <textarea name="description" id="banner_desc" cols="10" rows="5" class="form-control" ><?= $after_assoc['quotes'] ?></textarea>
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>" id="">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-primary text-center" style="border-bottom: 2px dashed #000;">Image Preview</h5>
                <img src="assets/uploads/testimonials/<?= $after_assoc['image'] ?>" alt="" id="pic" class="img-fluid">
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>