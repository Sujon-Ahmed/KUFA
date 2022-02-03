<?php 
$page = "brands";
$sub_page = "brand";
require "admin_header.php"
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Brands</li>
            <li class="breadcrumb-item active">Add-Brand</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Brand</h4>
                    <div class="card-body">
                        <form action="brand_post.php" method="POST" enctype="multipart/form-data">
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="banner_image" class="mb-1">Image</label> 
                                <input type="file" name="file" id="banner_image" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 text-center">
                <h5 class="text-primary text-center" style="border-bottom: 2px dashed #000;">Image Preview</h5>
                <img src="" alt="" id="pic" class="img-fluid">
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>