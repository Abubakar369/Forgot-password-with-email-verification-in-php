
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Reset Password</title>-->
<!--</head>-->
<!--<body>-->
<!--    <h2>Reset Password</h2>-->
<!--    <form action="password_reset_handler.php" method="POST">-->
<!--        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">-->
<!--        <input type="password" name="new_password" placeholder="Enter new password" required>-->
<!--        <button type="submit">Reset Password</button>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->



<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Reset Password</h2>
                <form action="password_reset_handler.php" method="POST" class="mt-4">
                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
