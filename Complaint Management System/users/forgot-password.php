<?php
include('includes/config.php');
error_reporting(0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists
    $query = mysqli_query($bd, "SELECT * FROM users WHERE userEmail='$email'");
    $num = mysqli_fetch_array($query);

    if ($num > 0) {
        $token = md5(rand()); // Generate a random token
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat); // Token expiration date (1 day)

        // Update user with reset token and expiration date
        mysqli_query($bd, "UPDATE users SET reset_token='$token', exp_date='$expDate' WHERE userEmail='$email'");

        // Send reset email
        $resetLink = "http://localhost/Complaint%20Management%20System/reset-password.php?token=$token";
        $subject = "Password Reset";
        $message = "Hi, click on this link to reset your password: $resetLink";
        $headers = "From: no-reply@yourdomain.com";
        mail($email, $subject, $message, $headers);

        $msg = "Password reset link has been sent to your email.";
    } else {
        $errormsg = "No account found with that email address.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Forgot Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body, html {
        height: 100%;
        overflow: hidden;
    }

    body {
        position: relative;
        background: rgba(39, 39, 39, 0.4);
    }

    /* Fullscreen video background */
    .video-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        
    }

        /* Use your existing styles from login screen */
        /* Ensure consistency with input fields and buttons */
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: rgba(39, 39, 39, 0.4);
            position: relative;
        }
        .form-box {
            width: 400px;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        header {
            color: #fff;
            font-size: 25px;
            text-align: center;
            padding: 10px 0;
        }
        .input-box {
            margin: 20px 0;
            position: relative;
        }
        .input-field {
            width: 100%;
            height: 45px;
            padding: 0 15px;
            border: none;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        .submit {
            font-size: 15px;
            height: 45px;
            width: 100%;
            border: none;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
        }
        .submit:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <header>Forgot Password</header>

            <?php if (isset($msg)) { ?>
                <div class="success-message">
                    <?php echo htmlentities($msg); ?>
                </div>
            <?php } ?>
            
            <?php if (isset($errormsg)) { ?>
                <div class="error-message">
                    <?php echo htmlentities($errormsg); ?>
                </div>
            <?php } ?>

            <form method="POST" action="">
                <div class="input-box">
                    <input type="email" class="input-field" name="email" placeholder="Enter your email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" name="submit" value="Reset Password">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
