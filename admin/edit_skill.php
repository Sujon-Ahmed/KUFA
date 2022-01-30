<?php 
$page = "abouts";
$sub_page = "about";
require "admin_header.php";
require "database.php";
$id = $_GET['skill_id'];
$select_skills = "SELECT * FROM skills WHERE skill_id = $id";
$result = mysqli_query($db_connection, $select_skills);
$after_assoc = mysqli_fetch_assoc($result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">About</li>
            <li class="breadcrumb-item active">Edit-Skill</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="card shadow-sm">
                    <h4 class="card-header text-center">Edit Skill</h4>
                    <div class="card-body">
                        <form action="skill_update.php" method="POST">
                            <!-- Name felid -->
                            <div class="mt-2">
                                <label for="name" class="mb-1">Skill Name</label> 
                                <input type="text" name="skill_name" value="<?= $after_assoc['skill_name'] ?>" id="name" class="form-control" >
                            </div>
                            <!-- Value felid -->
                            <div class="mt-2">
                                <label for="value" class="mb-1">Skill Value</label> 
                                <input type="number" name="skill_value" value="<?= $after_assoc['skill_percentage'] ?>" id="value" class="form-control" >
                            </div>
                            <div class="d-grid g-2 col-md-6 mx-auto py-3">
                                <input type="hidden" name="skill_id" value="<?= $after_assoc['skill_id'] ?>" id="">
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