<?php 
$page = "portfolios";
$sub_page = "portfolio";
require "database.php";
require "admin_header.php";
// fetch banners info in database
$select_portfolios = "SELECT * FROM `portfolios`";
$select_portfolio_result = mysqli_query($db_connection, $select_portfolios);
// $after_assoc_banners = mysqli_fetch_assoc($select_banners_result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Portfolios</li>
            <li class="breadcrumb-item active">View-Portfolio</li>
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
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_portfolio_result as $portfolio){ ?>
                        <tr>
                            <td><?= $portfolio['portfolio_id'] ?></td>
                            <td><?= $portfolio['portfolio_category'] ?></td>
                            <td><?= $portfolio['portfolio_title'] ?></td>
                            <td><img src="assets/uploads/portfolios/<?= $portfolio['portfolio_image'] ?>" width="100" class="img-fluid" alt=""></td>
                            <td>
                                <?php  
                                    $description = $portfolio['portfolio_description'];
                                    if (strlen($description) > 100) {
                                        echo substr($description,0,100).'...';
                                    } else {
                                        echo $description;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php if ($portfolio['portfolio_status'] == 0){ ?>
                                    <a href="portfolio_status_change.php?id=<?= $portfolio['portfolio_id'] ?>" class="btn btn-secondary btn-sm">Deactive</a>
                                <?php } else { ?>
                                    <a href="portfolio_status_change.php?id=<?= $portfolio['portfolio_id'] ?>" class="btn btn-primary btn-sm">active</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a title="Edit" href="edit_portfolio.php?portfolio_id=<?= $portfolio['portfolio_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a title="Delete" onclick="javascript:return confirm('Are You Sure?')" href="delete_portfolio.php?portfolio_id=<?= $portfolio['portfolio_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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