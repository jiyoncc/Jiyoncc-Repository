<?php
if (isset($_GET['register_msg']) && $_GET['register_msg'] == 1) {
    echo "<script>alert('Account already exist! Log in to Continue.')</script>";
    echo "<script>window.location.assign('user_register.php')</script>";
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up - Sweet & Delicaces Cake Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
</head>

<body>
    <form id="form" class="splash-container" data-parsley-validate="" method="post" action="insert_users.php">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="user_email" data-parsley-trigger="change" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password" name="user_password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" data-parsley-equalto="#pass1" type="password" required="" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="tel" name="user_mobile" data-parsley-trigger="change" required="" placeholder="Mobile no." pattern="[0-9]{11}" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="user_address" data-parsley-trigger="change" required="" placeholder="Address" autocomplete="off">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already have an account? <a href="user_login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
</body>
</html>