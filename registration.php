<html>
    <head>
        <meta charset="UTF-8">
        <title> Registration Page </title>
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
<h1> Welcome to our Page! </h1>
<h2> Please register here. </h2>
    <form action="registration.php" method="post">
            <div class="mb-3">
                <label for=""> Fullname
                    <input type="text" class="form-control" name="fullname">
                </label>
            </div>
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
                <label for=""> Confirm Password
                    <input type="password" id="fullname" class="form-control" name="pass2">
                </label>
            </div>
            <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Submit">
            </div>
    </form>
</div>
</body>
    <script src="js/bootstrap.js"></script>
</html>
