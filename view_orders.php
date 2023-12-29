<?php
include('../include/db.php');

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('Orders edited!');
    window.location.assign('view_orders.php');
    </script>";
}
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Order details edited!');
    window.location.assign('view_orders.php');
    </script>";
}
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>

<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Orders - Sweet & Delices Cake Shop</title>
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
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
                            <h2 class="pageheader-title">Orders</h2>
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
                            <h5 class="card-header">Orders Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Orders id</th>
                                                <th>Users id</th>
                                                <th>Delivery date</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT * FROM orders";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['order_id'];?></td>
                                                <td><?php echo $res['user_id'];?></td>
                                                <td><?php echo $res['delivery_date'];?></td>
                                                <td><?php echo $res['payment_method'];?></td>
                                                <td>Php. <?php echo $res['total_amount'];?>.00</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. </th>
                                                <th>Orders id</th>
                                                <th>Users id</th>
                                                <th>Delivery date</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Order Details Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Orders id</th>
                                                <th>Product name</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT * FROM order_details";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['order_id'];?></td>
                                                <td><?php echo $res['product_name'];?></td>
                                                <td><?php echo $res['quantity'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. </th>
                                                <th>Orders id</th>
                                                <th>Product name</th>
                                                <th>Quantity</th>
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

    <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit orders</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_orders.php" id="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header">Edit orders</h5>
                    <div class="card-body">    
                        <div class="form-group">
                            <label for="inputUsersId">Users id</label>
                            <input id="inputUsersId" type="number" min="1" name="user_id" required="" placeholder="Enter users id" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDeliveryDate">Delivery date</label>
                            <input id="inputDeliveryDate" type="date" name="delivery_date" required="" placeholder="Enter delivery date" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputPaymentMethod">Payment method</label>
                            <select id="inputPaymentMethod" name="payment_method" class="form-control">
                                <option>Cash</option>
                                <option>Card</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTotalAmount">Total amount</label>
                            <input id="inputTotalAmount" type="number" min="1" name="total_amount" required="" placeholder="Enter total amount" autocomplete="off" class="form-control">
                        </div>
                        <input type="hidden" name="hidden_orders">
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

    <div class="modal fade" id="exampleModal1" data-backdrop="static" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit orders detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_orders_detail.php" id="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header">Edit orders detail</h5>
                    <div class="card-body">    
                        <div class="form-group">
                            <label for="inputOrderId">Orders id</label>
                            <input id="inputOrderId" type="number" min="1" name="order_id" required="" placeholder="Enter order id" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProductName">Product name</label>
                            <input id="inputProductName" type="text" name="product_name" required="" placeholder="Enter product name" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Quantity</label>
                            <input id="inputQuantity" type="number" min="1" max="9" name="quantity" required="" placeholder="Enter quantity" autocomplete="off" class="form-control">
                        </div>
                        <input type="hidden" name="hidden_order_details">
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
    <script>
        function edit_orders(orders_id) {
            $.ajax({
                url:'get_orders.php',
                data:'id='+orders_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="users_id"]').val(res.users_id);
                    $('input[name="delivery_date"]').val(res.delivery_date);
                    $('select[name="payment_method"]').val(res.payment_method);
                    $('input[name="total_amount"]').val(res.total_amount);
                    $('input[name="hidden_orders"]').val(res.orders_id);
                }
            })
        }
        function delete_orders(orders_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_orders.php?orders_id="+orders_id;
            }
        }
        function edit_orders_detail(orders_detail_id) {
            $.ajax({
                url:'get_orders_detail.php',
                data:'id='+orders_detail_id,
                method:'get',
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $('input[name="orders_id"]').val(res.orders_id);
                    $('input[name="product_name"]').val(res.product_name);
                    $('input[name="quantity"]').val(res.quantity);
                    $('input[name="hidden_orders_detail"]').val(res.orders_detail_id);
                }
            })
        }
        function delete_orders_detail(orders_detail_id) {
            var flag = confirm("Do you want to delete?");
            if (flag) {
                window.location.href = "delete_orders_detail.php?orders_detail_id="+orders_detail_id;
            }
        }
    </script>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
}
?>