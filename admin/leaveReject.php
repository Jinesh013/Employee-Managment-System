<?php
session_start();
$con = mysqli_connect("localhost","root","","ems");

if(isset($_GET['leaveID']))
{
    $leaveID = $_GET['leaveID'];
    $reas = $_GET['LeaveReasons'];
    // echo $reas;
    $query = "UPDATE leavetable set LeaveStatus='Reject',LeaveRejectResons='$reas' where id = '$leaveID'";
    $query_run = mysqli_query($con, $query);

    $query2 = "select EmpUsername from leavetable where id = '$leaveID'";
    $result  = mysqli_query($con, $query2);
    $row1= mysqli_fetch_array($result);
    $username = $row1['EmpUsername'];

    
    if($query_run)
    {
        $_SESSION['status'] = "$username Leave Rejected Successfully";
        header("Location: leavePending.php");
        // echo $_SESSION['status'];
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong. Please try again.";
        header("Location: leavePending.php");
        // echo $_SESSION['status'];
    }
}
?>