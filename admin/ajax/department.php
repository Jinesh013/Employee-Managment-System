<?php

include '../includes/dbconnection.php';
$branch_id =   $_POST['branch_data'];

$department = "SELECT * FROM departmentmaster WHERE BranchCode = $branch_id";

// echo $branch;

$department_qry = mysqli_query($con, $department);

// $output="";

$output = '<option value="" selected disabled>Choose a Department</option>';

while ($department_row = mysqli_fetch_assoc($department_qry)) {
    $output .= '<option value="' . $department_row['DeptCode'] . '">' . $department_row['DeptName'] . '</option>';
}

echo $output;
