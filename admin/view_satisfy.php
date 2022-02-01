<?php 
$page = "satisfied";
$sub_page = "satisfy";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_satisfy = "SELECT * FROM `satisfies`";
$result = mysqli_query($db_connection, $select_satisfy);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Satisfy</li>
            <li class="breadcrumb-item active">View-Satisfy</li>
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
                            <th>Icon</th>
                            <th>Value</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $key=>$satisfy){ ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><i class="<?= $satisfy['icon'] ?>"></i></td>
                            <td><?= $satisfy['value'] ?></td>
                            <td><?= $satisfy['name'] ?></td>
                            <td>
                                <?php if ($satisfy['status'] == 0){ ?>
                                    <a href="satisfy_status_change.php?id=<?= $satisfy['id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="satisfy_status_change.php?id=<?= $satisfy['id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_satisfy.php?id=<?= $satisfy['id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_satisfy.php?id=<?= $satisfy['id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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