<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Management System</title>
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

    /* Main Section */
    .landing {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 100px 10vw;
        height: 100vh;
        background-color: #f4f4f4;
    }

    /* About Section */
    #about {
        padding: 80px 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05);
    }

    #about h2 {
        font-size: 2.5rem;
        font-family: 'Poppins', sans-serif;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    .aboutText p {
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

    .para ul {
        list-style-type: square;
        padding-left: 20px;
    }

    .para ul li {
        margin-bottom: 15px;
    }

    .para ul li strong {
        color: #2c3e50;
    }
    .btn {
        display: inline-block;
        margin-top: 30px;
        padding: 15px 30px;
        background-color: #3498db;
        color: white;
        text-transform: uppercase;
        border-radius: 50px;
        font-size: 1.1rem;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
        background-color: #2980b9;
    }
    /* Team Section */
    #team {
        padding: 80px 50px;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #team h2 {
        font-size: 2.5rem;
        font-family: 'Poppins', sans-serif;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    .team-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .team-member {
        text-align: center;
        max-width: 200px;
    }

    .team-member img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .team-member h3 {
        font-family: 'Poppins', sans-serif;
        margin-top: 15px;
        font-size: 1.2rem;
        color: #2c3e50;
    }

    .team-member p {
        font-size: 0.9rem;
        color: #7f8c8d;
    }

    /* Footer */
    .foot {
        background-color: #ecf0f1;
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

        .landing {
            flex-direction: column;
            text-align: center;
        }

        .landing img {
            width: 80%;
        }

        #about h2, #team h2 {
            font-size: 2rem;
        }

        .aboutText p {
            font-size: 1.3rem;
        }

        .btn {
            width: 100%;
            padding: 12px;
        }
        .team-grid {
            flex-direction: column;
            align-items: center;
        }

        .team-member img {
            width: 150px;
            height: 150px;
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
    <section id="about">
            <h2>About Us</h2>
            <div class="aboutText">
                <p>Welcome to the Complaint Management System</p>
            </div>
            <div class="para">
                <p>The <strong>Complaint Management System</strong> is designed to make the process of reporting and managing complaints smooth, transparent, and efficient. Our platform is intuitive, allowing users to file complaints with ease while enabling administrators to resolve issues promptly.</p>
            </div>
            <div class="para">
                <p>We believe in fostering communication between users and administrators to ensure that every complaint is heard and resolved with professionalism. The system allows users to track the progress of their complaints and ensure timely resolution.</p>
            </div>
            <div class="para">
                <p><strong>Key Features:</strong></p>
                <ul>
                    <li><strong>Simple Complaint Filing:</strong> Users can submit complaints easily through a streamlined process.</li>
                    <li><strong>Complaint Tracking:</strong> Track the status of your complaint from submission to resolution in real-time.</li>
                    <li><strong>Automated Updates:</strong> Receive timely notifications at each stage of the complaint handling process.</li>
                    <li><strong>Efficient Admin Tools:</strong> Administrators can manage complaints effectively with an intuitive dashboard, prioritizing critical issues and ensuring quick resolution.</li>
                    <li><strong>Transparency and Communication:</strong> Our system fosters open communication between complainants and resolution teams, ensuring clarity at all stages of the process.</li>
                </ul>
            </div>
           
            <div class="para">
                <p>We are dedicated to providing a streamlined platform that enhances the complaint resolution process. Our goal is to ensure all issues are addressed quickly and fairly, creating a positive experience for all users.</p>
            </div>
            <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/users/registration.php" class="btn">Get Started</a>
        </section> 

        <!-- Team Section -->
        <section id="team">
            <h2>Our Team</h2>
            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-member">
                    <img src="team_member1.jpg" alt="Team Member 1">
                    <h3>James fiifi</h3>
                    <p>CEO & Founder</p>
                </div>
                <!-- Team Member 2 -->
                <div class="team-member">
                    <img src="team_member2.jpg" alt="Team Member 2">
                    <h3>James</h3>
                    <p>Lead Developer</p>
                </div>
                <!-- Team Member 3 -->
                <div class="team-member">
                    <img src="team_member3.jpg" alt="Team Member 3">
                    <h3>Janet </h3>
                    <p>UI/UX Designer</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="foot">
        <p>&#169; 2024 Complaint Management System. All Rights Reserved.</p>
    </footer>
</body>

</html>
