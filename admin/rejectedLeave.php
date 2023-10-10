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
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
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
                    <h1 class="h3 mb-4 text-gray-800">Employees Leave Rejected</h1>

                    <hr>
                    <div class="form-inline" style=" margin-bottom:20px;">
                        <label for="search" class="font-weight-bold lead text-dark" style="margin-right:20px;">Search Record :</label>
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </div>
                    <hr>

                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th> Emp Username </th>
                                    <th> Emp First Name </th>
                                    <th> Leave Type </th>
                                    <th> Leave Reason </th>
                                    <th> Leave Reject Reaons </th>
                                    <th> Leave From </th>
                                    <th> Leave To </th>
                                    <th> Leave status </th>
                                </tr>
                            </tbody>
                            <tbody id="tableData">

                                <?php
                                        $query1 = "SELECT * FROM leavetable where LeaveStatus='Reject'";
                                        
                                        $query_run  = mysqli_query($con, $query1);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            $username=$row['EmpUsername'];
                                                ?>
                                <tr>
                                    <td><?= $row['EmpUsername']; ?></td>
                                    <?php
                                        $query2 = "select EmpFname from employeemaster where EmpUsername = '$username' ";
                                        $result  = mysqli_query($con, $query2); 
                                        $row1= mysqli_fetch_array($result);
                                        ?>
                                    <td><?php echo $row1['EmpFname'];?></td>
                                    <td><?php echo $row['LeaveType'];?></td>
                                    <td><?php echo $row['LeaveResons'];?></td>
                                    <td style="width:20%"><?php echo $row['LeaveRejectResons'];?></td>
                                    <td><?php echo $row['LeaveFrom'];?></td>
                                    <td><?php echo $row['LeaveTo'];?></td>
                                    <td>
                                        <p style="color:red"><?php echo $row['LeaveStatus'];?></p>
                                    </td>
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
$(document).ready(function(){
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

