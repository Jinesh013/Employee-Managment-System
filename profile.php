<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
// include('includes/auth_session.php');
//error_reporting(0);
if (strlen($_SESSION['username']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {

    $empid=$_GET['empid'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    // $Empcomid =$_POST['Companycode'];
    // $Empposition =$_POST['Empposition'];
    // $Deptcode =$_POST['Deptcode'];
    // $EmpBranch =$_POST['EmpBranch'];
    $CourseGRA =$_POST['CourseGRA'];
    $CollegeGRA =$_POST['CollegeGRA'];
    $YearpassingGRA =$_POST['YearpassingGRA'];
    $PercentageGRA =$_POST['PercentageGRA'];
    $Empemail =$_POST['Empemail'];
    // $Empcommail =$_POST['Empcommail'];
    $Empmobileno =$_POST['Empmobileno'];
    $Empgender =$_POST['Empgender'];
    $Empcountry =$_POST['Empcountry'];
    $Empstate =$_POST['Empstate'];
    $Empcity =$_POST['Empcity'];
    $DOB =$_POST['DOB'];
    // $Empjoingdate =$_POST['Empjoingdate'];
    $EmpAddress =$_POST['EmpAddress'];
    $Emppermanentaddress =$_POST['Emppermanentaddress'];
    $Empadharno =$_POST['Empadharno'];
    $Emppanno =$_POST['Emppanno'];
    // $Empusername =$_POST['Empusername'];
    // $Emppassword =$_POST['Emppassword'];

    $result=mysqli_query($con,"UPDATE employeemaster set EmpFname='$firstname',EmpLname='$lastname',CourseGRA='$CourseGRA',CollegeGRA='$CollegeGRA',YearPassingGRA='$YearpassingGRA',PercentageGRA='$PercentageGRA',EmpEmail='$Empemail',EmpMobileno='$Empmobileno',EmpGender='$Empgender',EmpCountry='$Empcountry',EmpState='$Empstate',EmpCity='$Empcity',EmpDOB='$DOB',EmpAddress='$EmpAddress',EmpPermanentAddress='$Emppermanentaddress',EmpAdharno='$Empadharno',EmpPanno='$Emppanno' WHERE id='$empid'");
    if ($result) {
    $msg1="Record Modified Successfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
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

    <title>Employee Profile </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">Employee Profile</h1>
                    <p style="font-size:16px; color:green" align="center"> <?php if($msg1){
                            echo $msg1;
                        }  ?> </p>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                                echo $msg;
                            }  ?> </p>
                    <form class="form" action="" method="post">

                        <div style="margin-left:650px;">
                        </div>
                        <?php
                        $empid=$_GET['empid'];
                        $result = mysqli_query($con,"SELECT * FROM employeemaster WHERE id='$empid'");
                        while($row= mysqli_fetch_array($result))
                        {
                        $Empcomid = $row['EmpComid'];
                        $Empbranchid = $row['EmpBranchId'];
                        $Empdeptid = $row['EmpDeptId'];
                        $Empdesignationid = $row['EmpDesignationId'];
                        ?>


                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="FirstName">First Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="firstname"
                                    value="<?php echo $row['EmpFname'];?>" placeholder="Enter firstname" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="lastName">Last Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="lastname"
                                    value="<?php echo $row['EmpLname'];?>" placeholder="Enter lastname" />

                            </div>
                        </div>

                        <br>
                        
                        <?php
                          $query2 = "select ComapnyName from companymaster where CompanyCode = '$Empcomid' ";
                          $result  = mysqli_query($con, $query2); 
                          $row2= mysqli_fetch_array($result);
                        ?>
                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Companycode">Company Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                            <input type="text" class="form-control form-control-user" name="Companycode"
                                    value="<?php echo $row2['ComapnyName']; ?>" placeholder="Enter Company code"
                                    disabled />

                            </div>
                        </div>
                        <br>

                        <?php
                          $query2 = "select BranchName from branchmaster where BranchCode = '$Empbranchid' ";
                          $result  = mysqli_query($con, $query2); 
                          $row2= mysqli_fetch_array($result);     
                        ?>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="EmpBranch">Branch Name :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="EmpBranch"
                                    value="<?php echo $row2['BranchName']; ?>" placeholder="Enter Emp Branch "
                                    disabled /> 
                            </div>
                        </div>
                        <br>

                        <?php
                          $query2 = "select DeptName from departmentmaster where DeptCode = '$Empdeptid' ";
                          $result  = mysqli_query($con, $query2); 
                          $row2= mysqli_fetch_array($result);     
                        ?>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="EmpDeptId">Department Name :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Deptcode"
                                    value="<?php echo $row2['DeptName']; ?>" placeholder="Enter Dept code" disabled />
                            </div>
                        </div>
                        <br>

                        <?php
                          $query2 = "select DesignationName from designation where DesignationCode = '$Empdesignationid' ";
                          $result  = mysqli_query($con, $query2); 
                          $row2= mysqli_fetch_array($result);
                        ?>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empdesignationid">Designation :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empposition"
                                    value="<?php echo $row2['DesignationName']; ?>" placeholder="Enter Emp position"
                                    disabled />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="CourseGRA">Course of Graduation Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="CourseGRA"
                                    value="<?php echo $row['CourseGRA']; ?>" placeholder="Enter Course GRA" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="CollegeGRA">College Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="CollegeGRA"
                                    value="<?php echo $row['CollegeGRA']; ?>" placeholder="Enter College GRA" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="YearpassingGRA">Passing Year Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="YearpassingGRA"
                                    value="<?php echo $row['YearPassingGRA']; ?>"
                                    placeholder="Enter Year Passing GRA" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="PercentageGRA">Percentage in Graduation :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="PercentageGRA"
                                    value="<?php echo $row['PercentageGRA']; ?>" placeholder="Enter Percentage GRA" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empemail">Personal Email :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="email" class="form-control form-control-user" name="Empemail"
                                    value="<?php echo $row['EmpEmail']; ?>" placeholder="Enter Email" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcommail">Comapany Email :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="email" class="form-control form-control-user" name="Empcommail"
                                    value="<?php echo $row['EmpComMail']; ?>" placeholder="Enter Company Mail" disabled />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empmobileno">Mobile No :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empmobileno"
                                    value="<?php echo $row['EmpMobileno']; ?>" placeholder="Enter Mobile no" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empmobileno">Gender :</label>
                            </div>
                            <div class="col-4 mb-3">


                                <?php if($row['EmpGender']=="Male")
                                  {?>
                                <input type="radio" id="gendermale" name="Empgender" value="Male" checked="true">
                                <label for="gendermale">Male</label>

                                <input type="radio" id="genderfemale" name="Empgender" value="Female">
                                <label for="genderfemale">Female</label>

                                <?php }  else {?>

                                <input type="radio" id="gendermale" name="Empgender" value="Male">
                                <label for="gendermale">Male</label>

                                <input type="radio" id="genderfemale" name="Empgender" value="Female" checked="true">
                                <label for="genderfemale">Female</label>
                                <?php }?>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcountry">Country :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empcountry"
                                    value="<?php echo $row['EmpCountry']; ?>" placeholder="Enter Country" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empstate">State :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empstate"
                                    value="<?php echo $row['EmpState']; ?>" placeholder="Enter State" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcity">City :</label>

                            </div>
                            <div class="col-8 mb-3">


                                <input type="text" class="form-control form-control-user" name="Empcity"
                                    value="<?php echo $row['EmpCity']; ?>" placeholder="Enter City" />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="DOB">DOB :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="date" class="form-control form-control-user" name="DOB"
                                    value="<?php echo $row['EmpDOB']; ?>" placeholder="Enter DOB" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empjoingdate">Joining Date :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="date" class="form-control form-control-user" name="Empjoingdate"
                                    value="<?php echo $row['EmpJoingdate']; ?>" placeholder="Enter Joingdate" disabled />


                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">


                                <label for="EmpAddress">Address :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="EmpAddress"
                                    value="<?php echo $row['EmpAddress']; ?>" placeholder="Enter Address" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Emppermanentaddress">Permanent Address :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Emppermanentaddress"
                                    value="<?php echo $row['EmpPermanentAddress']; ?>"
                                    placeholder="Enter Permanent Address" />


                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">


                                <label for="Empadharno">Adhar No :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empadharno"
                                    value="<?php echo $row['EmpAdharno']; ?>" placeholder="Enter Adhar no" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">


                                <label for="Emppanno">Pan No :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Emppanno"
                                    value="<?php echo $row['EmpPanno']; ?>" placeholder="Enter Pan no" />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empusername">Username :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empusername"
                                    value="<?php echo $row['EmpUsername']; ?>" placeholder="Enter Username"disabled />


                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Emppassword">Password :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="password" id="password" class="form-control form-control-user"
                                    name="Emppassword" value="<?php echo $row['EmpPassword']; ?>"
                                    placeholder="Enter Password	"disabled />
                                <input type="checkbox" name="showpassword" id="showpassword" onclick="showpass()"
                                    style="margin-top:15px;" >
                                <label for="showpassword" class="Showpassword">Show Password</label>

                            </div>
                        </div>
                        <br>

                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Update"
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    function showpass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    </script>
</body>

</html>

<?php
  }
?>