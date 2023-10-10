<?php
session_start();
$con = mysqli_connect("localhost","root","","ems");

if(isset($_POST['stud_delete_multiple_btn']) AND !empty($_POST['stud_delete_id']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);

    $query = "UPDATE employeemaster set Active='Deactive' where id IN($extract_id) ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = " Data Deleted Successfully";
        header("Location: employeelist.php");
    }
    else
    {
        $_SESSION['status'] = " Data Not Deleted";
        header("Location: employeelist.php");
    }
}
else
{
    $_SESSION['status'] = "Please, Select at least one check box";
    header("Location: employeelist.php");
}
?>