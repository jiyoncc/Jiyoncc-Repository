<?php
include('../include/db.php');

if (isset($_GET['login_success']) && $_GET['login_success'] == 1) {
    echo "<script>alert('Welcome Admin!')</script>";
    echo "<script>window.location.assign('dashboard.php')</script>";
}
?>
<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>    
<!doctype html>
<html lang="en">

 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - Sweet & Delices Cake Shop</title>
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
    <?php
        include('admin_nav.php');
        include('admin_sidenav.php');
        ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h3 class="card-title text-white">Users</h3>
                                <?php
                                $select_user = "SELECT * FROM user";
                                $query_user = mysqli_query($con, $select_user);
                                $res_users = mysqli_num_rows($query_user);
                                ?>
                                <p class="card-text">Number of users in database = <?php echo $res_users;?>.</p>
                                <a href="view_users.php" class="btn btn-rounded btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card bg-brand">
                            <div class="card-body">
                                <h3 class="card-title">Category</h3>
                                <?php
                                $select_category = "SELECT * FROM categories";
                                $query_category = mysqli_query($con, $select_category);
                                $res_category = mysqli_num_rows($query_category);
                                ?>
                                <p class="card-text">Number of categories in database = <?php echo $res_category;?>.</p>
                                <a href="view_category.php" class="btn btn-rounded btn-light">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <h3 class="card-title text-white">Products</h3>
                                <?php
                                $select_product = "SELECT * FROM products";
                                $query_product = mysqli_query($con, $select_product);
                                $res_product = mysqli_num_rows($query_product);
                                ?>
                                <p class="card-text">Number of products in database = <?php echo $res_product;?>.</p>
                                <a href="view_product.php" class="btn btn-rounded btn-info">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h3 class="card-title">Orders</h3>
                                <?php
                                $select_order = "SELECT * FROM orders";
                                $query_order = mysqli_query($con, $select_order);
                                $res_order = mysqli_num_rows($query_order);
                                ?>
                                <p class="card-text">Number of orders in database = <?php echo $res_order;?>.</p>
                                <a href="view_orders.php" class="btn btn-rounded btn-danger">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('../include/footer.php');?>

        </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
}
?>