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
        $category=$_POST['category'];
        $subcat=$_POST['subcategory'];
        $complaintype=$_POST['complaintype'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaindetails'];
        $compfile=$_FILES["compfile"]["name"];
        move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);

        // Handling the audio recording data
        if (!empty($_POST['audioData'])) {
            $audioData = $_POST['audioData'];
            $audioData = str_replace('data:audio/webm;base64,', '', $audioData);
            $audioData = base64_decode($audioData);

            // Create a unique filename for the audio file
            $audioFileName = uniqid() . '.webm';
            $filePath = 'complaintdocs/' . $audioFileName;

            // Save the audio file to the server
            file_put_contents($filePath, $audioData);
            
            // Insert into the database, including audio file
            $query = mysqli_query($bd, "insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile,audioFile) 
            values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile','$audioFileName')");
        } else {
            // Insert into the database without audio
            $query = mysqli_query($bd, "insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile) 
            values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile')");
        }

        // Get the latest complaint number
        $sql=mysqli_query($bd, "select complaintNumber from tblcomplaints order by complaintNumber desc limit 1");
        while($row=mysqli_fetch_array($sql)) {
            $cmpn=$row['complaintNumber'];
        }
        $complainno=$cmpn;
        echo '<script> alert("Your complaint has been successfully filed and your complaint number is '.$complainno.'")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS | User Register Complaint</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
    function getCat(val) {
        $.ajax({
            type: "POST",
            url: "getsubcat.php",
            data:'catid='+val,
            success: function(data){
                $("#subcategory").html(data);
            }
        });
    }
    </script>
</head>
<body>
<section id="container">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <?php if($successmsg) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                        </div>
                        <?php } ?>
                        <?php if($errormsg) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Oh snap!</b> <?php echo htmlentities($errormsg); ?>
                        </div>
                        <?php } ?>
                        <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Category</b></label>
                                <div class="col-sm-4">
                                    <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                        <option value="">Select Category</option>
                                        <?php $sql=mysqli_query($bd, "select id,categoryName from category");
                                        while ($rw=mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-sm-2 control-label"><b>Sub Category</b></label>
                                <div class="col-sm-4">
                                    <select name="subcategory" id="subcategory" class="form-control">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type</b></label>
                                <div class="col-sm-4">
                                    <select name="complaintype" class="form-control" required="">
                                        <option value="Complaint">Complaint</option>
                                        <option value="General Query">General Query</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-sm-2 control-label"><b>Region</b></label>
                                <div class="col-sm-4">
                                    <select name="state" required="required" class="form-control">
                                        <option value="">Select Region</option>
                                        <?php $sql=mysqli_query($bd, "select stateName from state");
                                        while ($rw=mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Nature of Complaint</b></label>
                                <div class="col-sm-4">
                                    <input type="text" name="noc" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details</b></label>
                                <div class="col-sm-4">
                                    <textarea name="complaindetails" required="required" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint File</b></label>
                                <div class="col-sm-4">
                                    <input type="file" name="compfile" class="form-control">
                                </div>
                            </div>
                            <!-- Audio recording section -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"><b>Record Complaint</b></label>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary" id="recordButton">Start Recording</button>
                                    <button type="button" class="btn btn-danger" id="stopButton" disabled>Stop Recording</button>
                                    <p id="recordingStatus" style="margin-top: 10px;">Not recording</p>
                                    <audio id="audioPlayback" controls style="display:none;"></audio>
                                    <input type="hidden" id="audioData" name="audioData">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10" style="padding-left:25% ">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <?php include("includes/footer.php");?>
</section>

<!-- JS placed at the end of the document -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/common-scripts.js"></script>
<script>
// Audio recording logic
let recordButton = document.getElementById('recordButton');
let stopButton = document.getElementById('stopButton');
let audioPlayback = document.getElementById('audioPlayback');
let recordingStatus = document.getElementById('recordingStatus');
let audioDataInput = document.getElementById('audioData');

let mediaRecorder;
let audioChunks = [];

// Start Recording
recordButton.addEventListener('click', async () => {
    let stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    mediaRecorder = new MediaRecorder(stream);
    mediaRecorder.start();
    recordingStatus.innerText = "Recording...";
    recordButton.disabled = true;
    stopButton.disabled = false;

    mediaRecorder.ondataavailable = (event) => {
        audioChunks.push(event.data);
    };

    mediaRecorder.onstop = async () => {
        let audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
        let audioUrl = URL.createObjectURL(audioBlob);
        audioPlayback.src = audioUrl;
        audioPlayback.style.display = 'block';

        // Convert Blob to Base64 for submission
        let reader = new FileReader();
        reader.readAsDataURL(audioBlob);
        reader.onloadend = function () {
            let base64data = reader.result;
            audioDataInput.value = base64data;  // Set base64 data in hidden input field
        };

        audioChunks = [];
        recordingStatus.innerText = "Not recording";
        recordButton.disabled = false;
        stopButton.disabled = true;
    };
});

// Stop Recording
stopButton.addEventListener('click', () => {
    mediaRecorder.stop();
});
</script>
</body>
</html>
<?php } ?>   
