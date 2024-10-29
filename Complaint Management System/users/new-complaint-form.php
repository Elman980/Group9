<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else
{
    if(isset($_POST['submit']))
    {
        $uid=$_SESSION['id'];
        $complaintdetials=$_POST['complaindetails'];
        $contact=$_POST['contact'];
        $compfile=$_FILES["compfile"]["name"];

        // Move uploaded file to the desired directory
        if($compfile) {
            move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
        }

        // Save complaint details to the database
        $query=mysqli_query($bd, "INSERT INTO tblcomplaints(userId, complaintDetails, contact, complaintFile) VALUES('$uid', '$complaintdetials', '$contact', '$compfile')");

        if($query) {
            echo '<script>alert("Your complaint has been successfully filed.")</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>CMS | New Complaint Form</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>
<style>
                                                                                                                                                             
</style>
<body>
<section id="container">
    <?php include("includes/header.php");?> 
    <?php include("includes/sidebar.php");?>
    <div class="container">
        <div class="form-wrapper">
            <h1>Lodge a Complaint</h1>
            <form method="post" enctype="multipart/form-data">
                <textarea name="complaindetails" placeholder="Describe your issue here..." required></textarea>
                <div class="upload-section">
                    <input type="file" name="compfile" class="upload-button">
                    <span>Have any image, video or audio file? Please attach.</span>
                </div>
                <input type="text" name="contact" placeholder="Contact" required>
                <p class="contact-info">Willing to assist with further explanations or hoping to receive feedback on your complaint. Provide an email or a phone number to reach you later.</p>
                <button type="submit" name="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
    <?php include("includes/footer.php");?>
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>
</body>
</html>
<?php } ?>
