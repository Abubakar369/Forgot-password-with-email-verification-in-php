<!DOCTYPE html>
<html>
<head>
    <title>Login and Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insert the new user into the database
        $stmt = $conn->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();

        echo "<div class='container'><div class='alert alert-success mt-4'>Registration successful. You can now <a href='index.php'>login</a>.</div></div>";
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>An account with that email address already exists.</div></div>";
    }
}
?>



</body>
</html>
