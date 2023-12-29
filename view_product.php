<?php
include('../include/db.php');

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Product edited!');
    window.location.assign('view_product.php');
    </script>";
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
    <title>View Product - Sweet & Delices Cake Shop</title>
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../css/inputmask.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
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
                            <h2 class="pageheader-title">Products</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View orders</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Product Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT products.*, categories.category_name FROM products JOIN categories ON products.product_category = categories.category_id";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['product_name'];?></td>
                                                <td><?php echo $res['category_name'];?></td>
                                                <td>Rs. <?php echo $res['product_price'];?></td>
                                                <td>
                                                	<?php
                                                	$file_array = explode(', ', $res['product_image']);
                                                	?>
                                                    <div class="owl-carousel owl-theme" style="width: 100px;">
                                                	<?php
                                                	for ($j=0; $j < count($file_array); $j++) {
                                                	?>
                                                    <div class="item"> 
                                                	<img src="../uploads/<?php echo $file_array[$j];?>" height="100px" width="100px">
                                                    </div>
                                                	<?php
                                                	}
                                                	?>
                                                    </div>
                                                </td>
                                                <td><?php echo $res['product_description'];?></td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-space btn-primary" onclick="edit_prod(<?php echo $res['product_id'];?>)">Edit</button>
                                                    <button onclick="delete_prod(<?php echo $res['product_id'];?>)" class="btn btn-space btn-secondary">DELETE</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. /tr></th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('../include/footer.php');?>
            </div>

        </div>

    </div>

    <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
       </div>
      <form action="edit_product.php" id="form" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="card">
            <h5 class="card-header">Edit product</h5>
                <div class="card-body">
                <div class="form-group">
                    <label for="inputProductName">Product Name</label>
                        <input id="inputProductName" type="text" name="product_name" required="" placeholder="Enter product name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputProductCategory">Categories</label>
                        <select class="form-control" id="inputProductCategory" name="product_category">
                        <?php
                        $select = "SELECT * FROM categories";
                        $query = mysqli_query($con, $select);
                        while ($res = mysqli_fetch_assoc($query)) {
                        ?>
                        <option value="<?php echo $res['category_id'];?>"><?php echo $res['category_name'];?></option>
                        <?php } ?>
                        </select>
                            <a href="add_category.php">Add category.</a>
                    </div>
                    <div class="form-group">
                        <label for="inputProductPrice">Price</label>
                        <input id="inputProductPrice" type="text" name="product_price" required="" placeholder="Enter product price" autocomplete="off" class="form-control currency-inputmask">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="product_image[]" multiple="">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                    <div class="form-group">
                        <label for="inputProductDescription">Description</label>
                        <textarea id="inputProductDescription" name="product_description" required="" placeholder="Product description" class="form-control"></textarea>
                       <input type="hidden" name="hidden_product">
                    </div>
                </div>
                </div>
    </div>
    <div class="modal-footer">
         <button type="reset" class="btn btn-space btn-secondary">Clear</button>
         <button type="submit" class="btn btn-space btn-primary">Save changes</button>
    </div>
    </form>
</div>
</div>
</div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/data-table.js"></script>
    <script src="../js/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
    <script>
        $(function(e){
            "use strict";
            $(".currency-inputmask").inputmask('999');
        });
        function edit_prod(product_id) {
            $.ajax({
                url:'get_product.php',
                data:'id='+product_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="product_name"]').val(res.product_name);
                    $('select[name="product_category"]').val(res.product_category);
                    $('input[name="product_price"]').val(res.product_price);
                    $('textarea[name="product_description"]').val(res.product_description);
                    $('input[name="hidden_product"]').val(res.product_id);
                }
            })
        }
        function delete_prod(prod_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_product.php?prod_id="+prod_id;
            }
        }
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:1}, 1000:{items:1}
                }
            })
        });
    </script>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
}
?>