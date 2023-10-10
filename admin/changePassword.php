<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['username']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {        
        $username = $_SESSION['username'];
        $password = $_POST['Emppassword'];
        $newpassword = $_POST['Empnewpassword'];
        $confirmnewpassword = $_POST['ConfirmPass'];
        $query = "SELECT * FROM admin WHERE AdminUsername='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_fetch_array($result);
        
        if($password!= $rows['Password'])
        {
            $msg1 = "You entered an incorrect password";
        }
        else
        {
            if($newpassword == $confirmnewpassword)
            {
                $query = "UPDATE admin SET Password='$newpassword' where AdminUsername='$username'";
                $sql=mysqli_query($con, $query);
                if($sql)
                {
                    $msg = "Congratulations You have successfully changed your password";
                }
                else
                {
                    $msg1 = "Something Went Wrong. Please try again.";
                }
            }

            else
            {
                $msg1 = "New Password and Confirm Password Not Match";
            }
        }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>change Password </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        
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
                    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

                    <p style="font-size:16px; color:green" align="center"> <?php if($msg){
                                echo $msg;
                                unset($msg);
                            }  ?> </p>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg1){
                                echo $msg1;
                                unset($msg1);
                            }  ?> </p>
                    <form class="form" action="" method="post">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empusername">Username :</label>

                            </div>
                            <div class="col-8 mb-3">
                            <input type="text" class="form-control form-control-user" name="Empusername" value="<?php echo $_SESSION['username']; ?>" required disabled/>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Emppassword">Password :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="password" class="form-control form-control-user" name="Emppassword"
                                    placeholder="Enter Password	" required />
                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empnewpassword">New Password :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="password" class="form-control form-control-user" name="Empnewpassword"
                                    placeholder="Enter New Password	" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="ConfirmPass">Confirm Password :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="password" class="form-control form-control-user" name="ConfirmPass"
                                    placeholder="RE-Enter New Password" required />
                            </div>
                        </div>
                        <br>


                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Register"
                                    class="btn btn-primary btn-user btn-block">

                            </div>
                        </div>
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

    <!-- Custom scripts for all pages -->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
<?php }  ?>