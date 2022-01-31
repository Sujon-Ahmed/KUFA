<?php 
$page = "services";
$sub_page = "service";
require "admin_header.php"
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Add-Heading</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Service Heading</h4>
                    <div class="card-body">
                        <form action="ser_head_post.php" method="POST">
                            <!-- Name felid -->
                            <div class="mt-2">
                                <label for="sub_title" class="mb-1">Service Sub Title</label> 
                                <input type="text" name="sub_title" id="sub_title" class="form-control" >
                            </div>
                            <!-- Value felid -->
                            <div class="mt-2">
                                <label for="title" class="mb-1">Service Title</label> 
                                <input type="text" name="title" id="title" class="form-control" >
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>