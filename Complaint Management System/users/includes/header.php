<style>
    /* Logo Styling */
.header .logo {
    color: #003366; /* Blue black text for logo */
    text-decoration: none;
    font-size: 24px; /* Larger font size */
    font-weight: bold;
}

/* Top Menu Styling */
.top-menu {
    float: right; /* Align logout button to the right */
}

ul.top-menu {
    margin: 0;
    padding: 0;
    list-style: none;
}

ul.top-menu > li > .logout {
	color: #f2f2f2;
	font-size: 12px;
	border-radius: 4px;
	-webkit-border-radius: 4px;
	border: 1px solid #010b42 !important;
	padding: 5px 15px;
	margin-right: 15px;
	background: #010b42;
	margin-top: 15px;
}

ul.top-menu > li > .logout:hover {
    background: #ffffff; /* Change background on hover */
    color: #010b42; /* Change text color on hover */
    border-color: #010b42; /* Change border color on hover */
}

.black-bg{
    background: #1a0147;
    border-bottom: 1px solid #02072E;
}


/* Responsive Adjustments */
@media (max-width: 768px) {
    .header {
        width: 100%;
        left: 0;
    }
}

    
</style>


<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/" class="logo"><b>Complaint Management System</b></a>
                
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="http://localhost/Complaint%20Management%20System/Complaint%20Management%20System/">Logout</a></li>
            	</ul>
            </div>
        </header>