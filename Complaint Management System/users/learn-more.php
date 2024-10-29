<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn more about our Complaint Management System">
    <meta name="author" content="Your Company">
    <title>Learn More | Complaint Management System</title>
    
    <!-- Stylesheets -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* General Reset */
        html, body {
            background-color: #f9f9f9;
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
            left: 0;
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .nav h1 {
            font-size: 1.6rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #333;
        }

        .nav .links a {
            margin-left: 20px;
            font-size: 0.9rem;
            color: #333;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease, border-bottom 0.3s ease;
            padding-bottom: 5px;
        }

        .nav .links a:hover {
            color: #e0501b;
            border-bottom: 2px solid #e0501b;
        }

        /* Main Section Styles */
        main {
            padding: 80px 20px 20px; /* Space for fixed header */
        }

        #learn-more {
            max-width: 1200px;
            margin: 0 auto;
        }

        #learn-more h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        #learn-more h2 {
            font-size: 2rem;
            color: #e0501b;
            margin-top: 40px;
            margin-bottom: 15px;
        }

        #learn-more p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        #learn-more ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        #learn-more ul li {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
        }

        #learn-more a {
            color: #e0501b;
            text-decoration: none;
        }

        #learn-more a:hover {
            text-decoration: underline;
        }

        /* How It Works Section Styles */
        .how-it-works {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .how-it-works .step {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap; /* Allows wrapping for smaller screens */
        }

        .how-it-works .step img {
            width: 50%;
            max-width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            margin-right: 20px;
        }

        .how-it-works .step div {
            max-width: 50%;
        }

        .how-it-works .step h3 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .how-it-works .step p {
            font-size: 1rem;
            color: #555;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>
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
        <section id="learn-more">
            <div>
                <h1>Learn More About Our Complaint Management System</h1>
                
                <!-- Image showcasing the system -->
                <div class="img-container">
                    <img src="assets/images/complaint-management-system.jpg" alt="Complaint Management System">
                </div>

                <p>Our Complaint Management System is designed to streamline the process of reporting and resolving issues. With a user-friendly interface and a robust backend, we ensure that all complaints are handled with the utmost efficiency and care.</p>

                <h2>Key Features</h2>
                <ul>
                    <li><strong>Easy Reporting:</strong> Quickly report issues through our intuitive interface.</li>
                    <li><strong>Real-Time Tracking:</strong> Monitor the status of your complaints and get timely updates.</li>
                    <li><strong>Detailed Categories:</strong> Categorize your complaints for better management and resolution.</li>
                    <li><strong>Remark and Feedback:</strong> Receive detailed feedback and updates on the progress of your complaints.</li>
                    <li><strong>Secure and Confidential:</strong> Your data and complaints are handled securely and with confidentiality.</li>
                </ul>

                <h2>How It Works</h2>
                <div class="how-it-works">
                    <div class="step">
                        <img src="assets/images/report-issue.jpg" alt="Report Issue">
                        <div>
                            <h3>1. Report</h3>
                            <p>Submit your complaint through our online form.</p>
                        </div>
                    </div>
                    <div class="step">
                        <img src="assets/images/track-status.jpg" alt="Track Status">
                        <div>
                            <h3>2. Track</h3>
                            <p>Check the status of your complaint anytime through our tracking system.</p>
                        </div>
                    </div>
                    <div class="step">
                        <img src="assets/images/resolve-issue.jpg" alt="Resolve Issue">
                        <div>
                            <h3>3. Resolve</h3>
                            <p>Receive updates and resolution details directly to your account.</p>
                        </div>
                    </div>
                </div>

                <h2>Why Choose Us?</h2>
                <p>Our system is designed to handle a high volume of complaints efficiently, ensuring that every issue is addressed promptly. We pride ourselves on our customer-centric approach and are committed to continuous improvement based on user feedback.</p>

                <h2>Contact Us</h2>
                <p>If you have any questions or need further information, feel free to <a href="contact.html">contact us</a>.</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Complaint Management System. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/common-scripts.js"></script>
</body>
</html>
