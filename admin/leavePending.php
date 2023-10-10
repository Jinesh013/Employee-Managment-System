<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['username']==0)) {
    header('location:logout.php');
}

include_once 'config.php';
$postData = '';
if(!empty($_SESSION['postData'])){
    $postData = $_SESSION['postData'];
    unset($_SESSION['postData']);
}
 
$status = $statusMsg = '';
if(!empty($_SESSION['status_response'])){
    $status_response = $_SESSION['status_response'];
    $status = $status_response['status'];
    $statusMsg = $status_response['status_msg'];
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

    <title>Employees Leave Details</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
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
                    <h1 class="h3 mb-4 text-gray-800">Employees Leave Pending</h1>

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
                    <hr>
                    <div class="form-inline" style=" margin-bottom:20px;">
                        <label for="search" class="font-weight-bold lead text-dark" style="margin-right:20px;">Search
                            Record :</label>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <!-- <form action="" method="post"> -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th> Emp Username </th>
                                    <th> Emp First Name </th>
                                    <th> Leave Type </th>
                                    <th> Leave Reason </th>
                                    <th> Leave Days </th>
                                    <th> Leave From </th>
                                    <th> Leave To </th>
                                    <th> Accept </th>
                                    <th> Reject </th>
                                </tr>
                            </tbody>
                            <tbody id="tableData">
                                <?php
                                    $query1 = "SELECT * FROM leavetable where LeaveStatus='Pending' order by id desc";
                                    $query_run  = mysqli_query($con, $query1);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                        $username=$row['EmpUsername'];
                                        $id=$row['id'];
                                    
                                    $query2 = "select EmpFname,id from employeemaster where EmpUsername = '$username'";
                                    $result  = mysqli_query($con, $query2);
                                    $row1= mysqli_fetch_array($result);
                                        
                                ?>
                                <tr>
                                    <td><a href='updateEmployee.php?Empid=<?php echo $row1['id'];?>'><?php echo $username;?></a>
                                    </td>

                                    <td><?php echo $row1['EmpFname'];?></td>
                                    <td><?php echo $row['LeaveType'];?></td>
                                    <td><?php echo $row['LeaveResons'];?></td>
                                    <td><?php echo $row['LeaveDays'];?></td>
                                    <td><?php echo $row['LeaveFrom'];?></td>
                                    <td><?php echo $row['LeaveTo'];?></td>
                                    <td><a style="border-size:10px;" class='btn btn-success btn-sm'
                                            href='leaveAccept.php?userid=<?php echo $id;?>'>Accept</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModal<?php echo $id;?>">
                                            Reject
                                        </button></td>

                                    <form action="leaveReject.php" method="get">

                                        <div class="modal fade" id="exampleModal<?php echo $id;?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reject Reason
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <label for="RejectReaons">Reject Reaons:</label>
                                                        <input style="width:70%;" type="text" id="LeaveReasons"
                                                            name="LeaveReasons">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="leaveID" value="<?php echo $id;?>">
                                                        <input type="submit" class="btn btn-danger" name="leaveReject"
                                                            value="Reject">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </tr>
                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                <tr>
                                    <td colspan="9">No Record Found</td>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableData tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

</body>

</html>