




<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php
include 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Check if the token is valid
    $stmt = $conn->prepare('SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()');
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Update the user's password
        $stmt = $conn->prepare('UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?');
        $stmt->bind_param('ss', $new_password, $token);
        $stmt->execute();

        echo "<div class='container'><div class='alert alert-success mt-4'>Your password has been reset successfully.</div></div>";
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>Invalid or expired token.</div></div>";
    }
}
?>

</body>
</html>

