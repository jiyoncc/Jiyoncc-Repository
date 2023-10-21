<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
            <h1>Welcome to our Page!</h1>
            <h2>Please fill out the form.</h2>
            <div class="mb-3">
                <label for="fullname">Fullname:</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="mb-3">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" name="uname">
            </div>
            <div class="mb-3">
                <label for="pass1">Password:</label>
                <input type="password" class="form-control" id="pass1" name="pass1">
            </div>
            <div class="mb-3">
                <label for="pass2">Confirm Password:</label>
                <input type="password" class="form-control" id="pass2" name="pass2">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
            <div class="mb-3">
                <br><a href="registration.php">Create Account</a>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>
