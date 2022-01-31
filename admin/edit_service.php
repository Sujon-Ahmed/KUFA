<?php 
$page = "services";
$sub_page = "service";
require "admin_header.php";
$id = $_GET['service_id'];
$select_services = "SELECT * FROM services WHERE service_id = $id";
$result = mysqli_query($db_connection, $select_services);
$after_assoc = mysqli_fetch_assoc($result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Add-Service</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Add Service</h4>
                    <div class="card-body">
                        <form action="service_update.php" method="POST">
                            <!-- sub title felid -->
                            <div class="mt-2">
                                <label for="service_icon" class="mb-1">Service Icon <small><a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2">Visit</a></small></label> 
                                <input type="text" name="service_icon" value="<?= $after_assoc['service_icon'] ?>" id="service_icon" class="form-control" placeholder="fa fa-example">
                            </div>
                            <!-- title felid -->
                            <div class="mt-2">
                                <label for="service_title" class="mb-1">Service Title</label> 
                                <input type="text" name="service_name" value="<?= $after_assoc['service_name'] ?>" id="service_title" class="form-control" >
                            </div>
                            <!-- image felid -->
                            <div class="mt-2">
                                <label for="description" class="mb-1">Description</label> 
                                <textarea name="description" id="banner_desc" cols="10" rows="5" class="form-control" ><?= $after_assoc['service_description'] ?></textarea>
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <input type="hidden" name="service_id" value="<?= $after_assoc['service_id'] ?>">
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