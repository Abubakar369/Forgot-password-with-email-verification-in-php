

<html>
<head>
    <title>Forgot Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    
    
    
    
    
    
    
 <?php
include 'config.php'; // Include your database connection

function smtp_mailer($email, $subject, $msg) {
    global $conn; // Assuming $conn is your database connection object
    
    // Check if the email exists in the database
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Save the token and expiry time in the database
        $stmt = $conn->prepare('UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?');
        $stmt->bind_param('sss', $token, $expiry, $email);
        $stmt->execute();
        
        // Send the reset link to the user's email
        $reset_link = "https://freecodelocker.com/password_reset.php?token=$token";

        // Prepare the HTML message with the reset link button
        $msg = "
            <html>
            <head>
                <style>
                    .btn {
                        background-color: #4CAF50; /* Green */
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                <p>Click the button below to reset your password:</p>
                <a href='$reset_link' class='btn'>Reset Password</a>
            </body>
            </html>
        ";
        
        


        // Send email using PHPMailer
        require_once('smtp/PHPMailerAutoload.php');
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com"; 
        $mail->Port = 587; 
        // $mail->SMTPDebug = 2;  Enable debug output
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; // Uncomment to enable debug mode
        
        // Set the sender's email address
        $mail->Username = "abc@gmail.com"; // Your Gmail address (sender's email)
        $mail->Password = "xyzi mlce jakw zlxx"; // Your Gmail app-specific password
        $mail->SetFrom("abc@gmail.com"); // Sender's email address
        
        // Set the email subject and body
        $mail->Subject = $subject; // Email subject
        $mail->Body = $msg; // Email content

        // Set the recipient's email address
        $mail->AddAddress($email); // Recipient's email address (user's email)

        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        
        if (!$mail->Send()) {
            echo $mail->ErrorInfo; // Display error message if email sending fails
        } else {
            echo "<div class='container'><div class='alert alert-success mt-4'>A reset link has been sent to your email address.</div></div>";
        }
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>No account found with that email address.</div></div>";
    }
}

// Assuming this script is executed when a form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $subject = "Password Reset";
    $msg = "Click this link to reset your password: https://freecodelocker.com/password_reset.php?token=TOKEN_PLACEHOLDER";
    smtp_mailer($email, $subject, $msg);
}
?>

 
    
    
    
    
    
    
    

// <?php
// include 'config.php'; // Include your database connection

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $_POST['email'];

    // Check if the email exists in the database
    // $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    // $stmt->bind_param('s', $email);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // if ($result->num_rows == 1) {
    //     // Generate a unique token
    //     $token = bin2hex(random_bytes(50));
    //     $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Save the token and expiry time in the database
        // $stmt = $conn->prepare('UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?');
        // $stmt->bind_param('sss', $token, $expiry, $email);
        // $stmt->execute();

        // Send the reset link to the user's email
        // $reset_link = "https://freecodelocker.com/password_reset.php?token=$token";
    //     mail($email, "Password Reset", "Click this link to reset your password: $reset_link");

    //     echo "<div class='container'><div class='alert alert-success mt-4'>A reset link has been sent to your email address.</div></div>";
    // } else {
    //     echo "<div class='container'><div class='alert alert-danger mt-4'>No account found with that email address.</div></div>";
//     }
// }
// ?>


</body>
</html>

