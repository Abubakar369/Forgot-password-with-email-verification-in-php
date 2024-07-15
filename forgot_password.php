<!-- forgot_password.php -->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Forgot Password</title>-->
<!--</head>-->
<!--<body>-->
<!--    <h2>Forgot Password</h2>-->
<!--    <form action="send_reset_link.php" method="POST">-->
<!--        <input type="email" name="email" placeholder="Enter your email" required>-->
<!--        <button type="submit">Send Reset Link</button>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->



<!-- forgot_password.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Forgot Password</h2>
                <form action="send_reset_link.php" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

