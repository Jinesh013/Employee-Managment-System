<?php
include('includes/dbconnection.php');
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit();
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

    <title> Employee Leave Management System </title>

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
        <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/header.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><strong> Employee Leave Management System</strong></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Col -->
                        <div class="col-xl-3 col-md-6 mb-4"></div>

                        <!-- Content Col -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Welcome Back !
                                            </div>

                                            <!-- Admin name -->
                                            <?php

                                              $adminusername=$_SESSION['username'];
                                              $ret=mysqli_query($con,"select AdminName from admin where AdminUsername='$adminusername'");
                                              $row=mysqli_fetch_array($ret);
                                              $name=$row['AdminName'];

                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $name; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-blue-300" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br><br>


                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Col -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a class="" href="leavePending.php">

                                                    <span>Leave Pending !</span>
                                                </a>
                                            </div>

                                            <!-- Employee Leave Pending -->
                                            <?php
                                              
                                              $query = "SELECT * FROM leavetable where LeaveStatus='Pending'";
                                              $query_run  = mysqli_query($con, $query);
                                              //Leave Pending Counter
                                              $Countrequest=0;
                                              if(mysqli_num_rows($query_run) > 0)
                                              {
                                                foreach($query_run as $row)
                                                {
                                                $Countrequest=$Countrequest+1;
                                                }
                                            }
                                            
                                              ?>


                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $Countrequest ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="far fa-comment-alt fa-2x text-gray-300"></i> -->
                                            <i class="fa fa-spinner text-blue-300" style="font-size:25px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Col -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a class="" href="employeelist.php">
                                                    <span>Total Employee !</span>
                                                </a>

                                            </div>

                                            <!-- Total Employee -->
                                            <?php
                                              
                                              $query = "SELECT * FROM employeemaster where Active='Active'";
                                              $query_run  = mysqli_query($con, $query);
                                              //Employee Counter
                                              $CountEmployee=0;
                                              if(mysqli_num_rows($query_run) > 0)
                                                {
                                                  foreach($query_run as $row)
                                                    {
                                                        $CountEmployee=$CountEmployee+1;
                                                    }
                                                }
                                            
                                              ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $CountEmployee ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-blue-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Col -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Company !
                                            </div>

                                            <!-- Total Company -->
                                            <?php
                                              
                                              $query = "SELECT * FROM companymaster";
                                              $query_run  = mysqli_query($con, $query);
                                              //Company Counter
                                              $CountCom=0;
                                              if(mysqli_num_rows($query_run) > 0)
                                              {
                                                foreach($query_run as $row)
                                                {
                                                $CountCom=$CountCom+1;
                                                }
                                            }
                                              ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $CountCom ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-blue-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <br>
                    <div class="d-sm-flex mb-4" style="justify-content:center;">
                        <h1 class="h3 mb-0 text-gray-800">Other Details</h1>
                    </div>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Col -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a class="" href="acceptedLeave.php">

                                                    <span>Leave Approve !</span>
                                                </a>

                                            </div>

                                            <!-- Employee Leave Accept -->
                                            <?php
                                              
                                              $query = "SELECT * FROM leavetable where LeaveStatus='Accept'";
                                              $query_run  = mysqli_query($con, $query);
                                              //Leave Accept Counter
                                              $CountAccept=0;
                                              if(mysqli_num_rows($query_run) > 0)
                                              {
                                                foreach($query_run as $row)
                                                {
                                                $CountAccept=$CountAccept+1;
                                                }
                                            }
                                            
                                              ?>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $CountAccept ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-user fa-2x text-gray-300"></i> -->
                                            <i class="fa fa-check-square text-blue-300" style="font-size:25px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Col -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                
                                                <a class="" href="rejectedLeave.php">
                                                    <span>Leave Rejected !</span>
                                                </a>

                                            </div>

                                            <!-- Employee Leave Reject -->
                                            <?php

                                              $query = "SELECT * FROM leavetable where LeaveStatus='Reject'";
                                              $query_run  = mysqli_query($con, $query);
                                              //Leave Reject Counter
                                              $CountReject=0;
                                              if(mysqli_num_rows($query_run) > 0)
                                              {
                                                foreach($query_run as $row)
                                                {
                                                $CountReject=$CountReject+1;
                                                }
                                             }
                                            
                                              ?>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $CountReject ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-user fa-2x text-gray-300"></i> -->
                                            <i class="fa fa-times text-blue-300" style="font-size:25px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br><br><br>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
    <?php include_once('includes/footer.php');?>
    <!-- End of Footer -->


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>