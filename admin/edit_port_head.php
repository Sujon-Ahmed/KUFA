<?php 
$page = "portfolios";
$sub_page = "portfolio";
require "admin_header.php";
require "database.php";
$id = $_GET['portfolio_head_id'];
$select_port_head = "SELECT * FROM `portfolio_heading` WHERE `portfolio_head_id`=$id";
$result = mysqli_query($db_connection, $select_port_head);
$after_assoc_heading = mysqli_fetch_assoc($result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Portfolio</li>
            <li class="breadcrumb-item active">Edit-Portfolio-Heading</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Edit Portfolio Heading</h4>
                    <div class="card-body">
                        <form action="port_head_update.php" method="POST">
                            <!-- Name felid -->
                            <div class="mt-2">
                                <label for="sub_heading" class="mb-1">Sub Heading</label> 
                                <input type="text" name="sub_heading" value="<?= $after_assoc_heading['portfolio_sub_heading'] ?>" id="sub_heading" class="form-control" >
                            </div>
                            <!-- Value felid -->
                            <div class="mt-2">
                                <label for="main_heading" class="mb-1">Skill Value</label> 
                                <input type="text" name="main_heading" value="<?= $after_assoc_heading['portfolio_main_heading'] ?>" id="main_heading" class="form-control" >
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <input type="hidden" name="id" value="<?= $after_assoc_heading['portfolio_head_id'] ?>" id="">
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