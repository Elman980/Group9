<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Improved Sidebar UI</title>
    <style>
        @import url('https://fonts.cdnfonts.com/css/mona-sans');
        /* Sidebar Styling */
        #sidebar {
            width: 250px;
            height: 100vh; /* Full height sidebar */
            position: fixed;
            background: #ffffff; /* Light background */
            border-right: 1px solid #ddd;
            transition: all 0.3s ease;
            padding-top: 80px; /* Add padding to create space between header and sidebar */
            font:mona-sans ;
        }

        .nav-collapse.collapse {
            display: inline;
        }

        /* Sidebar Menu */
        ul.sidebar-menu {
            padding-top: 75px; /* Adjusted to avoid header overlap */
            padding-left: 0;
            list-style: none;
            margin: 0;
        }

        ul.sidebar-menu li {
            margin-bottom: 15px; /* Increased margin for better spacing */
            position: relative;
        }

        ul.sidebar-menu li a {
            color: #333;
            font-size: 16px; /* Larger font for better readability */
            padding: 15px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: background 0.3s ease, color 0.3s ease;
            border-radius: 8px;
        }

        /* Hover effect updated to blue */
        ul.sidebar-menu li a:hover, ul.sidebar-menu li a.active {
            background: #007bff; /* Blue background on hover */
            color: #ffffff;
        }

        ul.sidebar-menu li a i {
            margin-right: 15px;
            font-size: 20px; /* Slightly larger icons */
        }

        ul.sidebar-menu li ul.sub {
            display: none;
            padding-left: 20px;
        }

        ul.sidebar-menu li.active ul.sub, ul.sidebar-menu li:hover ul.sub {
            display: block;
        }

        ul.sidebar-menu li ul.sub li a {
            font-size: 16px; /* Smaller font for submenu */
            padding: 10px 25px; /* Adjusted padding for submenus */
        }

        /* User Profile Section */
        .centered {
            text-align: center;
            margin-bottom: 20px;
            color: #000;
        }

        .centered img {
            border-radius: 50%;
            width: 70px; /* Larger image size */
            border: 2px solid #fdd006;
            transition: transform 0.3s ease;
        }

        .centered img:hover {
            transform: scale(1.1); /* Zoom effect on hover */
        }

        .centered h5 {
            font-size: 20px;
            font-weight: bold;
            color: #000; /* Set username to black */
            margin-top: 10px;
        }

        /* Main Content */
        #main-content {
            margin-left: 250px; /* Adjusted for the new sidebar width */
            padding: 20px;
            background: #f9f9f9;
            min-height: 100vh;
        }

        /* Header styling updated to white with black text */
        .header {
            background: #ffffff; /* White background for header */
            padding: 15px;
            color: #000; /* Black text for the header */
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            #sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            #main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 576px) {
            ul.sidebar-menu li a {
                font-size: 16px;
            }

            ul.sidebar-menu li a i {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Section -->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" id="nav-accordion">
                <!-- User Profile -->
                <div class="centered">
                    <a href="profile.html">
                        <img src="assets/img/ui-sam.jpg" alt="User Profile">
                    </a>
                    <?php $query = mysqli_query($bd, "select fullName from users where userEmail='" . $_SESSION['login'] . "'"); 
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <h3><?php echo htmlentities($row['fullName']); ?></h3> <!-- Username in black -->
                    <?php } ?>
                </div>

                <!-- Menu Items -->
                <li class="mt">
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Account Setting</span>
                    </a>
                    <ul class="sub">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="change-password.php">Change Password</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="register-complaint.php">
                        <i class="fa fa-book"></i>
                        <span>Lodge Complaint</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="complaint-history.php">
                        <i class="fa fa-tasks"></i>
                        <span>Complaint History</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
