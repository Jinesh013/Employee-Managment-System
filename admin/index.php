<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['username'])) {
  $username =$_POST ['username']; 
  $password = $_POST['password'];
  
  $query    = "SELECT 'AdminUsername' FROM `admin` WHERE AdminUsername='$username'AND Password='$password'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_num_rows($result);
  if ($rows == 1) {
      $_SESSION['username'] = $username;
      // Redirect to user dashboard page
      header("Location: welcome.php");
       
  } else {
        echo "<script type='text/javascript'>alert('Invalid Credentials ! Please try again.');
      window.location.assign('index.php')</script>";
  }
}
  else {
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Login</title>
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <header>
        <nav>
            <div class="header">
                <h1>Employee Management System</h1>
            </div>
        </nav>
    </header>
    <main>

        <form action="" method="post">
            <div class="container bg-gradient-primary">
                <div class="LoginTitle">
                    <h3>Admin Login Here</h3>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="EmpUsername" class="login">Username : </label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="username" name="username" placeholder="Enter Username " required
                            autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="EmpPassword" class="login">Password : </label>
                    </div>
                    <div class="col-75">
                        <input type="password" class="password" id="password" name="password"
                            placeholder="Enter Password " required>
                        <input type="checkbox" name="showpassword" id="showpassword" onclick="showpass()"
                            style="margin-top:15px;">
                        <label for="showpassword" class="Showpassword">Show Password</label>
                    </div>
                </div>

                <div class="subbutton">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </main>

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