<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $username=$_POST['Empusername'];
    $Password=$_POST['Password'];

  $query    = "SELECT 'EmpUsername' FROM `employeemaster` WHERE EmpUsername='$username' && EmpPassword='$Password'  && active='Active'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_num_rows($result);


    if($rows == 1){
      $_SESSION['username']=$username;
     header('location:welcome.php');
    }
    else{
      echo "<script type='text/javascript'>alert('Invalid Credentials ! Please try again.');
      window.location.assign('index.php')</script>";
    }
  }
  else{
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <h3 align="center" style="color: black; padding-top: 2%">Employee Managment System</h3>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">


                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="Empusername"
                                                name="Empusername" placeholder="Enter Email Address..." required="true" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password"
                                                name="Password" placeholder="Password" required="true">
                                        </div>

                                        

                                        <p> <input type="submit" class="btn btn-primary btn-user btn-block" style="width:80%" name="login"
                                                value="login"></p>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


<?php
  }
?>