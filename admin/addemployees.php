<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['username']==0)) {
  header('location:logout.php');
  } else{

// Post requset for data
if(isset($_POST['submit']))
  {
    // Coolect All Data
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $Empcomid=$_POST['Companycode'];
    $Empbranchid =$_POST['Empbranchid'];
    $Empdept =$_POST['Empdeptid'];
    $Empposition =$_POST['Empdesignationid'];
    $CourseGRA =$_POST['CourseGRA'];
    $CollegeGRA =$_POST['CollegeGRA'];
    $YearpassingGRA =$_POST['YearpassingGRA'];
    $PercentageGRA =$_POST['PercentageGRA'];
    $Empemail =$_POST['Empemail'];
    $Empcommail =$_POST['Empcommail'];
    $Empmobileno =$_POST['Empmobileno'];
    $Empgender =$_POST['Empgender'];
    $Empcountry =$_POST['Empcountry'];
    $Empstate =$_POST['Empstate'];
    $Empcity =$_POST['Empcity'];
    $DOB =$_POST['DOB'];
    $Empjoingdate =$_POST['Empjoingdate'];
    $EmpAddress =$_POST['EmpAddress'];
    $Emppermanentaddress =$_POST['Emppermanentaddress'];
    $Empadharno =$_POST['Empadharno'];
    $Emppanno =$_POST['Emppanno'];
    $Empusername =$_POST['Empusername'];
    $Emppassword =$_POST['Emppassword'];
    $create_datetime = date("Y-m-d H:i:s");

    // Query for validation
    $query1    = "SELECT EmpUsername FROM `employeemaster` WHERE EmpUsername = '$Empusername' AND active='Active'";
    $result1 = mysqli_query($con, $query1);
    $count = mysqli_num_rows($result1);

    if($count > 0)
    {
        $msg1 = "Employee Username Alredy Exits"; 
    }
    else{
        // Query for inserting data into database
        $query    = "INSERT into `employeemaster` (EmpFname,EmpLname,EmpComid,EmpDesignationId,EmpDeptId,EmpBranchId,CourseGRA,CollegeGRA,YearPassingGRA,PercentageGRA,EmpEmail,EmpComMail,EmpMobileno,EmpGender,EmpCountry,EmpState,EmpCity,EmpDOB,EmpJoingdate,EmpAddress,EmpPermanentAddress,EmpAdharno,EmpPanno,EmpUsername,EmpPassword,create_datetime) VALUES ('$firstname','$lastname','$Empcomid', '$Empposition','$Empdept','$Empbranchid','$CourseGRA','$CollegeGRA','$YearpassingGRA','$PercentageGRA','$Empemail','$Empcommail','$Empmobileno','$Empgender','$Empcountry','$Empstate','$Empcity','$DOB','$Empjoingdate','$EmpAddress','$Emppermanentaddress','$Empadharno','$Emppanno','$Empusername','$Emppassword','$create_datetime')";

        $result   = mysqli_query($con, $query);

        if ($result) {
            $msg="New employee registered successfully.";
          }
        else{
          $msg1 = "Something Went Wrong. Please try again.";
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

    <title>Add Employee </title>

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
                    <h1 class="h3 mb-4 text-gray-800">Add Employee</h1>

                    <p style="font-size:16px; color:green" align="center"> <?php if($msg){
                                echo $msg;
                            }  ?> </p>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg1){
                                echo $msg1;
                            }  ?> </p>
                    <form class="form" method="post">

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="FirstName">First Name :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="firstname"
                                    placeholder="Enter firstname" required autofocus />

                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="lastName">Last Name :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="lastname"
                                    placeholder="Enter lastname" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Companycode">Company Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <select id="Comcode" name="Companycode" style="width:80%;">
                                    <option selected disabled> Choose a Company</option>
                                    <!-- Dependent dropdown box -->
                                    <?php
                                    $result2  = mysqli_query($con, "SELECT ComapnyName,CompanyCode FROM companymaster"); 
                                    while ($row2= mysqli_fetch_array($result2)) { ?>
                                    <option value="<?php echo $row2['CompanyCode']; ?>">
                                        <?php echo $row2['ComapnyName']; ?> </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empbranchid">Branch Name :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <!-- Dependent dropdown box -->
                                <select id="branch" name='Empbranchid' style="width:80%;">
                                    <option selected disabled>Choose a Branch</option>
                                </select>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="EmpDeptId">Department Name :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <!-- Dependent dropdown box -->
                                <select id="dept" name='Empdeptid' style="width:80%;">
                                    <option selected disabled>Choose a Department</option>
                                </select>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empdesignationid">Designation :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <!-- Dependent dropdown box -->
                                <select id="designation" name='Empdesignationid' style="width:80%;">
                                    <option selected disabled>Choose a Designation</option>
                                </select>

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="CourseGRA">Course of Graduation Name :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="CourseGRA"
                                    placeholder="Enter Course GRA" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="CollegeGRA">College Name :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="CollegeGRA"
                                    placeholder="Enter College GRA" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="YearpassingGRA">Passing Year Name :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="YearpassingGRA"
                                    placeholder="Enter Year Passing GRA" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="PercentageGRA">Percentage in Graduation :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="PercentageGRA"
                                    placeholder="Enter Percentage GRA" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empemail">Personal Email :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="email" class="form-control form-control-user" name="Empemail"
                                    placeholder="Enter Email" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcommail">Comapany Email :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="email" class="form-control form-control-user" name="Empcommail"
                                    placeholder="Enter Company Mail" requiredF />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empmobileno">Mobile No :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empmobileno"
                                    placeholder="Enter Mobile no" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empgender">Gender :</label>
                            </div>
                            <div class="col-4 mb-3">

                                <input type="radio" id="gendermale" name="Empgender" value="Male">
                                <label for="gendermale">Male</label>
                                <input type="radio" id="genderfemale" name="Empgender" value="Female">
                                <label for="genderfemale">Female</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcountry">Country :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empcountry"
                                    placeholder="Enter Country" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empstate">State :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="Empstate"
                                    placeholder="Enter State" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empcity">City :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empcity"
                                    placeholder="Enter City" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="DOB">DOB :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="date" class="form-control form-control-user" name="DOB"
                                    placeholder="Enter DOB" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empjoingdate">Joining Date :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <input type="date" class="form-control form-control-user" name="Empjoingdate"
                                    placeholder="Enter Joingdate" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="EmpAddress">Address :</label>
                            </div>
                            <div class="col-8 mb-3">

                                <input type="text" class="form-control form-control-user" name="EmpAddress"
                                    placeholder="Enter Address" required />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Emppermanentaddress">Permanent Address :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Emppermanentaddress"
                                    placeholder="Enter Permanent Address" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">

                                <label for="Empadharno">Adhar No :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empadharno"
                                    placeholder="Enter Adhar no" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Emppanno">Pan No :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Emppanno"
                                    placeholder="Enter Pan no" required />

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Empusername">Username :</label>

                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Empusername"
                                    placeholder="Enter Username" required />

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

    <script>
    $('#Comcode').on('change', function() {
        var Comcode_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/branch.php',
            type: "POST",
            data: {
                Comcode_data: Comcode_id
            },
            success: function(result) {
                $('#branch').html(result);
                // console.log(result);
            }
        })
    });


    $('#branch').on('change', function() {
        var branch_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/department.php',
            type: "POST",
            data: {
                branch_data: branch_id
            },
            success: function(result) {
                $('#dept').html(result);
                // console.log(result);
            }
        })
    });


    $('#dept').on('change', function() {
        var dept_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/designation.php',
            type: "POST",
            data: {
                dept_data: dept_id
            },
            success: function(result) {
                $('#designation').html(result);
                // console.log(result);
            }
        })
    });
    </script>

</body>

</html>
<?php }  ?>