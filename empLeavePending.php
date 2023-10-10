<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['username']==0)) {
    header('location:logout.php');
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

    <title>Employees Leave Accepted</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">My Leave Pending</h1>

                    <p style="font-size:16px; color:green" align="center">
                        <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    if(!empty($statusMsg)) {
                        unset($_SESSION['status_response']);
                        // echo $statusMsg;
                    }
                ?>
                    </p>

                    <div class="table-responsive">
                        <!-- <form action="" method="POST"> -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th> Username </th>
                                    <th> First Name </th>
                                    <th> Leave Reason </th>
                                    <th> Leave From </th>
                                    <th> Leave To </th>
                                    <th> Leave status </th>
                                </tr>
                            </tbody>
                            <tbody>

                                <?php
                                        $username = $_SESSION['username'];
                                        // echo $username;
                                        $query1 = "SELECT * FROM leavetable where LeaveStatus = 'Pending' and EmpUsername= '$username' ";
                                        $query_run  = mysqli_query($con, $query1);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                <tr>
                                    <td><?= $row['EmpUsername']; ?></td>
                                    <?php
                                        $query2 = "select EmpFname from employeemaster where EmpUsername = '$username' ";
                                        $result  = mysqli_query($con, $query2); 
                                        $row1= mysqli_fetch_array($result);
                                        ?>
                                    <td><?php echo $row1['EmpFname'];?></td>
                                    <td><?php echo $row['LeaveResons'];?></td>
                                    <td><?php echo $row['LeaveFrom'];?></td>
                                    <td><?php echo $row['LeaveTo'];?></td>    
                                    <td><p style="color:blue"><?php echo $row['LeaveStatus'];?></p></td>
                                        

                                    
                                </tr>
                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                                <?php
                                        }
                                    ?>
                            </tbody>
                        </table>
                        <!-- </form> -->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->
            <?php
mysqli_close($con);
?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>