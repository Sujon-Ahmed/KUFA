<?php 
$page = "messages";
$sub_page = "message";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_messages = "SELECT * FROM `messages` ORDER BY id DESC";
$result = mysqli_query($db_connection, $select_messages);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Messages</li>
            <li class="breadcrumb-item active">View-Message</li>
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
                            <th>Email</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $message){ ?>
                        <tr>
                            <td><?= $message['id'] ?></td>
                            <td><?= $message['name'] ?></td>
                            <td><?= $message['email'] ?></td>
                            <td><?= $message['message'] ?></td>
                            <td><?= date('m-d-y h:i A',strtotime($message['time'])) ?></td>
                            <td>
                                <a onclick="javascript:return confirm('Are You Sure?')" href="delete_message.php?id=<?= $message['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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