<?php 
$page = "portfolios";
$sub_page = "portfolio";
require "admin_header.php"
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Portfolio</li>
            <li class="breadcrumb-item active">Add-Portfolio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Portfolio</h4>
                    <div class="card-body">
                        <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                            <!-- sub title felid -->
                            <div class="mt-2">
                                <label for="portfolio_category" class="mb-1">Category</label> 
                                <input type="text" name="portfolio_category" id="portfolio_category" class="form-control" >
                            </div>
                            <!-- title felid -->
                            <div class="mt-2">
                                <label for="portfolio_title" class="mb-1">Title</label> 
                                <input type="text" name="portfolio_title" id="portfolio_title" class="form-control" >
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="portfolio_image" class="mb-1">Image</label> 
                                <input type="file" name="file" id="portfolio_image" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="description" class="mb-1">Description</label> 
                                <textarea name="description" id="banner_desc" cols="10" rows="5" class="form-control" ></textarea>
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-primary text-center" style="border-bottom: 2px dashed #000;">Image Preview</h5>
                <img src="" alt="" id="pic" class="img-fluid">
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>