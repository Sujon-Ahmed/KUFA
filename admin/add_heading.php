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
            <li class="breadcrumb-item active">Add-Portfolio-Heading</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Portfolio Heading</h4>
                    <div class="card-body">
                        <form action="port_head_post.php" method="POST">
                            <!-- Name felid -->
                            <div class="mt-2">
                                <label for="sub_heading" class="mb-1">Sub Heading</label> 
                                <input type="text" name="sub_heading" id="sub_heading" class="form-control" >
                            </div>
                            <!-- Value felid -->
                            <div class="mt-2">
                                <label for="main_heading" class="mb-1">Skill Value</label> 
                                <input type="text" name="main_heading" id="main_heading" class="form-control" >
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