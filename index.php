<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login and Register</title>
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
            <div class="col-md-6">
                <h2 class="text-center mt-5">Register</h2>
                <form action="register_handler.php" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="reg_email">Email:</label>
                        <input type="email" class="form-control" id="reg_email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_password">Password:</label>
                        <input type="password" class="form-control" id="reg_password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
