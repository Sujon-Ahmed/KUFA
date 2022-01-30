<?php 
$page = "abouts";
$sub_page = "about";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_skills = "SELECT * FROM `skills`";
$select_skills_result = mysqli_query($db_connection, $select_skills);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Abouts</li>
            <li class="breadcrumb-item active">View-About</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table" id="banners">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Programming Language</th>
                            <th>Percentage</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_skills_result as $skill){ ?>
                        <tr>
                            <td><?= $skill['skill_id'] ?></td>
                            <td><?= $skill['skill_name'] ?></td>
                            <td><?= $skill['skill_percentage'] ?></td>
                            <td>
                                <?php if ($skill['skill_status'] == 0){ ?>
                                    <a href="skill_status_change.php?skill_id=<?= $skill['skill_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="skill_status_change.php?skill_id=<?= $skill['skill_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_skill.php?skill_id=<?= $skill['skill_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_skill.php?skill_id=<?= $skill['skill_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php require "admin_footer.php" ?>