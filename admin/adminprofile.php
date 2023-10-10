<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['username']==0)) {
  header('location:logout.php');
  } else{

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Profile</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/header.php')?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Admin Profile</h1>

                    <form class="user" method="post" action="">
                        <?php
                        // Query for Admin profile Details
                            $adminid=$_GET['adminid'];
                            $ret=mysqli_query($con,"select * from admin where id='$adminid'");
                            while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Adminname">Admin Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" style="text-size:10px;"
                                    name="Adminname" value="<?php echo $row['AdminName']; ?>" placeholder="Enter Name"
                                    disabled />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Adminusername">Admin Username :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Adminusername"
                                    value="<?php echo $row['AdminUsername'];?>" placeholder="Enter Username" disabled />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Password">Admin Password :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" id="password" class="form-control form-control-user" name="password"
                                    value="<?php echo $row['Password'];?>" placeholder="Enter password" disabled />


                            </div>
                        </div>
                        <br>

                        <?php } ?>


                    </form>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>


</body>

</html>
<?php }  ?>