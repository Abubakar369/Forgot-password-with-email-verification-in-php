



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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "<div class='container'><div class='alert alert-success mt-4'>Login successful. Welcome " . $user['email'] . "!</div></div>";
        } else {
            echo "<div class='container'><div class='alert alert-danger mt-4'>Invalid email or password.</div></div>";
        }
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>Invalid email or password.</div></div>";
    }
}
?>


</body>
</html>


