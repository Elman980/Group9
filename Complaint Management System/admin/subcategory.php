<?php
session_start();
include('include/config.php');

// Redirect to login if session not found
if(strlen($_SESSION['alogin'])==0) {	
    header('location:index.php');
} else {
    
    // Inserting a new subcategory
    if(isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];

        // Dummy insert into the subcategory table
        $sql = mysqli_query($bd, "INSERT INTO subcategory (categoryid, subcategory) VALUES ('$category', '$subcat')");
        
        if($sql) {
            $_SESSION['msg'] = "SubCategory Created !!";
        } else {
            $_SESSION['msg'] = "Error in creating SubCategory !!";
        }
    }

    // Deleting subcategory if "delete" action triggered
    if(isset($_GET['del'])) {
        mysqli_query($bd, "DELETE FROM subcategory WHERE id = '".$_GET['id']."'");
        $_SESSION['delmsg'] = "SubCategory deleted !!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | SubCategory</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theme.css">
</head>
<body>
    <?php include('include/header.php'); ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php'); ?>

                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Sub Category</h3>
                            </div>
                            <div class="module-body">

                                <!-- Success or error messages -->
                                <?php if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?>
                                        <?php $_SESSION['msg'] = ""; ?>
                                    </div>
                                <?php } ?>

                                <?php if(isset($_SESSION['delmsg']) && !empty($_SESSION['delmsg'])) { ?>
                                    <div class="alert alert-error">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?>
                                        <?php $_SESSION['delmsg'] = ""; ?>
                                    </div>
                                <?php } ?>

                                <!-- Form to create subcategory -->
                                <form class="form-horizontal row-fluid" name="subcategory" method="post">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Category</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" required>
                                                <option value="">Select Category</option>
                                                <?php 
                                                $query = mysqli_query($bd, "SELECT * FROM category");
                                                while($row = mysqli_fetch_array($query)) { ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row['categoryName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">SubCategory Name</label>
                                        <div class="controls">
                                            <input type="text" name="subcategory" class="span8 tip" placeholder="Enter SubCategory Name" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Create</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <!-- SubCategory table -->
                        <div class="module">
                            <div class="module-head">
                                <h3>Manage SubCategories</h3>
                            </div>
                            <div class="module-body table">
                                <table class="datatable-1 table table-bordered table-striped display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Creation Date</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = mysqli_query($bd, "SELECT subcategory.id, category.categoryName, subcategory.subcategory, subcategory.creationDate, subcategory.updationDate FROM subcategory JOIN category ON category.id = subcategory.categoryid");
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row['categoryName']); ?></td>
                                                <td><?php echo htmlentities($row['subcategory']); ?></td>
                                                <td><?php echo htmlentities($row['creationDate']); ?></td>
                                                <td><?php echo htmlentities($row['updationDate']); ?></td>
                                                <td>
                                                    <a href="edit-subcategory.php?id=<?php echo $row['id']; ?>"><i class="icon-edit"></i></a>
                                                    <a href="subcategory.php?id=<?php echo $row['id']; ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
                                                </td>
                                            </tr>
                                        <?php $cnt++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><!--/.content-->
                </div><!--/.span9-->
            </div>
        </div><!--/.container-->
    </div><!--/.wrapper-->

    <?php include('include/footer.php'); ?>

    <!-- Scripts -->
    <script src="scripts/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        });
    </script>
</body>
</html>

<?php } ?>
