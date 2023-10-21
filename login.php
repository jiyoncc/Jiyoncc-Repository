<html>
    <head>
        <meta charset="UTF-8">
        <title> Login Page </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: pink;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="login.php" method="post">
    <h1> Welcome, <?php echo $_POST['uname'];?>!</h1>
    <h2> Please login here. </h2>
            <div class="mb-3">
                <label for=""> Username
                    <input type="text" class="form-control" name="uname">
                </label>
            </div>
            <div class="mb-3">
                <label for=""> Password
                    <input type="password" class="form-control" name="pass1">
                </label>
            </div>
            <div class="mb-3">
                    <input type="submit" class="btn btn-success">
            </div>
    </form>
</div>
</body>
    <script src="js/bootstrap.js"></script>
</html>
