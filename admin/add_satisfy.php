<?php 
$page = "satisfied";
$sub_page = "satisfy";
require "admin_header.php"
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Satisfy</li>
            <li class="breadcrumb-item active">Add-Satisfy</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Satisfy</h4>
                    <div class="card-body">
                        <form action="satisfy_post.php" method="POST">
                            <!-- icon felid -->
                            <div class="mt-2">
                                <label for="icon" class="mb-1">Satisfy Icon <small><a target="_blank" href="https://www.flaticon.com/">Visit</a></small></label> 
                                <input type="text" name="icon" id="icon" class="form-control" placeholder="flaticon-example">
                            </div>
                            <!-- Value felid -->
                            <div class="mt-2">
                                <label for="value" class="mb-1">Satisfy Value</label> 
                                <input type="number" name="value" id="value" class="form-control" >
                            </div>
                            <!-- name felid -->
                            <div class="mt-2">
                                <label for="name" class="mb-1">Satisfy Name</label> 
                                <input type="text" name="name" id="name" class="form-control" >
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