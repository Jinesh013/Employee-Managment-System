<?php
require_once 'dbConfig.php'; 
$con = mysqli_connect("localhost","root","","ems");

if(isset($_GET['userid']))
{
    $userid = $_GET['userid'];
    $query = "UPDATE leavetable set LeaveStatus='Accept' where id = '$userid'";
    $query_run = mysqli_query($con, $query);

    $query2 = "select * from leavetable where id = '$userid'";
    $result  = mysqli_query($con, $query2);
    $row1= mysqli_fetch_array($result);
    $username = $row1['EmpUsername'];
    if($query_run)
{
    $_SESSION['status'] = "$username  Leave Aceepted Successfully";
    // header("Location: leavePending.php");
}
else
{
    $_SESSION['status'] = "Something Went Wrong. Please try again.";
    // header("Location: leavePending.php");
}
     
 
$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 
 
    $_SESSION['postData'] = $_POST;
    $ret=mysqli_query($con,"select EmpFname from employeemaster where EmpUsername='$username'");
    $row=mysqli_fetch_array($ret);

    $title = $row1['LeaveType'];
    $description = $row1['EmpUsername'] . ' ' . $row['EmpFname'] .' has leave on ' . $row1['LeaveFrom'] . ' To ' . $row1['LeaveTo'] . ' For ' . $row1['LeaveResons'];
    $location = 'Innova System';
    $date = $row1['LeaveFrom'];
    $time_from = $row1['TimeFrom'];
    $time_to = $row1['TimeTo'];

    // Validate form input fields 
    if(empty($title)){ 
        $valErr .= 'Please enter event title.<br/>'; 
    } 
    if(empty($date)){
        $valErr .= 'Please enter event date.<br/>';
    } 
     
    // Check whether user inputs are empty 
    if(empty($valErr)){ 
        
        // Insert data into the database 
        $sqlQ = "INSERT INTO events (title,description,location,date,time_from,time_to,created) VALUES (?,?,?,?,?,?,NOW())"; 
        $stmt = $db->prepare($sqlQ); 
        $stmt->bind_param("ssssss", $db_title, $db_description, $db_location, $db_date, $db_time_from, $db_time_to); 
        $db_title = $title; 
        $db_description = $description; 
        $db_location = $location; 
        $db_date = $date; 
        $db_time_from = $time_from; 
        $db_time_to = $time_to; 
        $insert = $stmt->execute(); 
         
        if($insert){ 
            $event_id = $stmt->insert_id; 
            unset($_SESSION['postData']); 
            $_SESSION['last_event_id'] = $event_id; 
            header("Location: $googleOauthURL"); 
            exit();
        }else{
            $statusMsg = 'Something went wrong, please try again after some time.';
        }
    }else{
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr, '<br/>'); 
    }
}else{
    $statusMsg = 'Form submission failed!'; 
} 
 
$_SESSION['status_response'] = array('status' => $status, 'status_msg' => $statusMsg); 
 
header("Location: leavePending.php"); 
exit(); 
?>