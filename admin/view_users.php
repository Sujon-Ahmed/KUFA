<?php 
$page = "users";
$sub_page = "user";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_users = "SELECT * FROM `users`";
$select_users_result = mysqli_query($db_connection, $select_users);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">View-Users</li>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_users_result as $user){ ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_phone'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td>
                                <img src="assets/uploads/users/<?= $user['user_photo'] ?>" width="50" alt="">
                            </td>
                            <td><?= $user['user_address'] ?></td>
                            <td>
                                <?php if ($user['status'] == 0){ ?>
                                    <a href="user_status_change.php?id=<?= $user['user_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="user_status_change.php?id=<?= $user['user_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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