<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['username']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']) )
  {
    if (isset($_POST['Leavetype']))
    {
    
    $empusername=$_SESSION['username'];
    $Leavetype=$_POST['Leavetype'];
    $Leaveresons=$_POST['Leaveresons'];
    $Leavefrom=$_POST['Leavefrom'];
    $Leaveto =$_POST['Leaveto'];
    $leaveDays=$_POST['setText'];
    $create_datetime = date("Y-m-d H:i:s");
       
    $query = "INSERT into `leavetable` (EmpUsername,LeaveType,LeaveResons,LeaveFrom,LeaveTo,LeaveDays,create_datetime) VALUES ('$empusername','$Leavetype','$Leaveresons','$Leavefrom','$Leaveto','$leaveDays','$create_datetime')";
        
    $result   = mysqli_query($con, $query);

    if ($result) {
    $msg="Leave Sent successfully.";
  }
  else
    {
      $msg1="Something Went Wrong. Please try again.";
    }
  }
  else
  {
    $msg1 = "Please, Fill out all fields";
  }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Leave Request</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Leave Request</h1>

                    <p style="font-size:16px; color:green" align="center"> <?php if($msg){
                                echo $msg;
                            }  ?> </p>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg1){
                                echo $msg1;
                                // unset($msg1);
                            }  ?> </p>


                    <form class="form" action="" method="post">

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Leavetype">Leave :</label>

                            </div>
                            <div class="col-8 mb-3">

                                <select name="Leavetype" id="Leave" style="width:80%">
                                    <option value="" selected disabled>--- Choose a Leave Type ---</option>
                                    <?php
                                    $query = "SELECT * FROM `leavetype`";
                                    $query_run   = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                    ?>
                                    <option value="<?php echo $row['LeaveName'] ?>"><?php echo $row['LeaveName'] ?>
                                    </option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Leaveresons">Leave Reasons :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" name="Leaveresons"
                                    placeholder="Enter Leave Reason" required autofocus />
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Leavefrom">Leave From :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="date" id="start_date" class="form-control form-control-user"
                                    name="Leavefrom" placeholder="Enter Leave From" required autofocus />
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="Leaveto">Leave To :</label>
                            </div>
                            <div class="col-8 mb-3">
                                <input type="date" id="end_date" onchange="getDays()"
                                    class="form-control form-control-user" name="Leaveto" placeholder="Enter Leave To"
                                    required autofocus />
                                <input type="hidden" name="setText" id="setText">
                                <span id="days" style="color:green"></span>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    //get the days between two dates

    function getDays() {

        var start_date = new Date(document.getElementById('start_date').value);
        var end_date = new Date(document.getElementById('end_date').value);
        //Here we will use getTime() function to get the time difference
        var time_difference = end_date.getTime() - start_date.getTime();
        //Here we will divide the above time difference by the no of miliseconds in a day
        var days_difference = time_difference / (1000 * 3600 * 24);
        //alert(days);
        document.getElementById('days').innerHTML = 'Total leave days ' + days_difference;

        var setText = days_difference;
        document.getElementById('setText').value = setText;
    }
    </script>

    <script>
    function displayblock() {
        var x = document.getElementById("myDIV");
        x.style.display = "block";
    }

    function displaynone() {
        var x = document.getElementById("myDIV");
        x.style.display = "none";
    }
    </script>

</body>

</html>
<?php }  ?>