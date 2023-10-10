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

    <title>Employees Details</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>

                    <p style="font-size:16px; color:green" align="center">
                        <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                ?>
                    </p>

                    <hr>
                    <div class="form-inline" style=" margin-bottom:20px;">
                        <label for="search" class="font-weight-bold lead text-dark" style="margin-right:20px;">Search
                            Record :</label>
                        <input class="form-control" id="myInput" type="text" placeholder="Search...">
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <form action="code1.php" method="POST">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th>
                                            <button type="submit" name="stud_delete_multiple_btn"
                                                class="btn btn-danger">Delete</button>
                                        </th>
                                        <th> First Name </th>
                                        <th> Username </th>
                                        <th> Company Name </th>
                                        <th> Branch </th>
                                        <th> Deptment </th>
                                        <th> Designation </th>
                                        <th> Emp Joing Date </th>
                                        <th> Update </th>
                                    </tr>
                                </tbody>
                                <tbody id="tableData">

                                    <?php
                                        $con = mysqli_connect("localhost","root","","ems");

                                        $query = "SELECT * FROM employeemaster where active='Active' order by EmpJoingdate desc";
                                        $query_run  = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                $Empcomid = $row['EmpComid'];
                                                $Empbranchid = $row['EmpBranchId'];
                                                $Empdeptid = $row['EmpDeptId'];
                                                $Empdesignationid = $row['EmpDesignationId'];
                                                ?>
                                    <tr>
                                        <td style="width:10px; text-align: center;">
                                            <input type="checkbox" name="stud_delete_id[]" value="<?= $row['id']; ?>">
                                        </td>
                                        <td><?= $row['EmpFname']; ?></td>
                                        <td><a
                                                href='updateEmployee.php?Empid=<?php echo $row['id'];?>'><?php echo $row['EmpUsername'];?></a>
                                        </td>
                                        <!-- Company name  -->
                                        <?php
                                        $query2 = "select ComapnyName from companymaster where CompanyCode = '$Empcomid' ";
                                        $result  = mysqli_query($con, $query2);
                                        $row2= mysqli_fetch_array($result);
                                        ?>
                                        <td><?php echo $row2['ComapnyName'];?></td>


                                        <!-- Branch  name -->
                                        <?php
                                        $query2 = "select BranchName from branchmaster where BranchCode = '$Empbranchid' ";
                                        $result  = mysqli_query($con, $query2);
                                        $row2= mysqli_fetch_array($result);
                                        ?>
                                        <td><?php echo $row2['BranchName'];?></td>


                                        <!-- Dept name -->
                                        <?php
                                        $query2 = "select DeptName from departmentmaster where DeptCode = '$Empdeptid' ";
                                        $result  = mysqli_query($con, $query2);
                                        $row2= mysqli_fetch_array($result);
                                        ?>
                                        <td><?php echo $row2['DeptName'];?></td>


                                        <!-- Designation name -->
                                        <?php
                                        $query2 = "select DesignationName from designation where DesignationCode = '$Empdesignationid' ";
                                        $result  = mysqli_query($con, $query2);
                                        $row2= mysqli_fetch_array($result);
                                        ?>
                                        <td><?php echo $row2['DesignationName'];?></td>

                                        <!-- Employee Joing date -->

                                        <td><?php echo $row['EmpJoingdate'];?></td>
                                        <td><a class='btn btn-primary btn-sm'
                                                href='updateEmployee.php?Empid=<?php echo $row['id'];?>'>Update</a>
                                        </td>
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
                        </form>
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