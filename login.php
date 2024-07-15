
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Login</title>-->
<!--</head>-->
<!--<body>-->
<!--    <h2>Login</h2>-->
<!--    <form action="login_handler.php" method="POST">-->
<!--        <input type="email" name="email" placeholder="Enter your email" required>-->
<!--        <input type="password" name="password" placeholder="Enter your password" required>-->
<!--        <button type="submit">Login</button>-->
<!--    </form>-->
<!--    <a href="forgot_password.php">Forgot Password?</a>-->
<!--</body>-->
<!--</html>-->
<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Login</h2>
                <form action="login_handler.php" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <a href="forgot_password.php" class="btn btn-link btn-block">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

