<?php
// Database connection
$host = 'localhost';
$dbname = 'cms';
$username =  "Lurich1";
$password = "Jameson1";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handling form submission
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        $success = "Message sent successfully!";
    } else {
        $error = "Failed to send the message!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Complaint Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<style>
    /* General Reset */
    html, body {
        background-color: #f0f2f5;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    /* Navbar Styles */
    .nav {
        position: fixed;
        z-index: 1000;
        top: 0;
        right: 0;
        left: 0;
        height: 80px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 25px 0 25px;
        background-color: #fff;
        box-shadow: 0 19px 38px rgba(0,0,0,0.10);
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .nav h1 {
        font-size: 1.8rem;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #2c3e50;
    }

    .nav .links a {
        margin-left: 25px;
        font-size: 1rem;
        color: #080808;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .nav .links a:hover {
        color: #2980b9;
    }

    /* Contact Section */
    #contact {
        padding: 80px 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f0f2f5;
        margin: 100px 10vw;
    }

    #contact h2 {
        font-size: 2.5rem;
        font-family: 'Poppins', sans-serif;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    .contactText p {
        font-size: 2.0rem;
        font-family: 'Roboto', sans-serif;
        color: #080808;
        margin-bottom: 20px;
        text-align: center;
    }

    .para {
        max-width: 900px;
        font-size: 1rem;
        line-height: 1.7;
        color: #080808;
        text-align: justify;
    }

    .para p {
        margin: 20px 0;
        color: #7f8c8d;
    }

    /* Contact Form */
    .contact-form {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 700px;
    }

    .contact-form input,
    .contact-form textarea {
        margin: 15px 0;
        padding: 15px;
        font-size: 1rem;
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .contact-form textarea {
        resize: none;
        height: 150px;
    }

    .contact-form input[type="submit"] {
        background-color: #3498db;
        color: white;
        text-transform: uppercase;
        border-radius: 50px;
        font-size: 1.1rem;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease;
        cursor: pointer;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        width: 200px;
        align-self: center;
    }

    .contact-form input[type="submit"]:hover {
        background-color: #2980b9;
    }

    /* Footer */
    .foot {
        background-color: #e0501b;
        padding: 20px 0;
        text-align: center;
        font-size: 0.9rem;
        color: #7f8c8d;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .nav h1 {
            font-size: 1.5rem;
        }

        #contact h2 {
            font-size: 2rem;
        }

        .contactText p {
            font-size: 1.3rem;
        }

        .contact-form input,
        .contact-form textarea {
            font-size: 1rem;
        }

        .contact-form input[type="submit"] {
            width: 100%;
        }
    }
</style>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <h1>Complaint Management System</h1>
            </div>
            <div class="links">
                <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/">File a Complaint</a>
                <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/admin/index.php">Admin</a>
                <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/users/registration.php">Login</a>
                <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/users/contact.php">Contact Us</a>
            </div>
        </div>
    </header>

    <main>
        <section id="contact">
            <h2>Contact Us</h2>
            <div class="contactText">
                <p>We'd love to hear from you. Please fill out the form below to get in touch.</p>
            </div>

            <!-- Success or Error message display -->
            <?php if (isset($success)) : ?>
                <p style="color: green; text-align: center;"><?php echo $success; ?></p>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <p style="color: red; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>

            <div class="para">
                <p>If you have any questions, feedback, or require assistance, feel free to reach out. Our team is dedicated to resolving your issues promptly.</p>
            </div>

            <form class="contact-form" action="" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <input type="submit" name="submit" value="Send Message">
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&#169; 2024 Complaint Management System. All Rights Reserved.</p>
    </footer>
</body>

</html>
