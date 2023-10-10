<?php

include '../includes/dbconnection.php';
$dept_id =   $_POST['dept_data'];

$designation = "SELECT * FROM designation WHERE DeptCode = $dept_id";

// echo $branch;

$designation_qry = mysqli_query($con, $designation);

// $output="";

$output = '<option value="" selected disabled>Choose a Designation</option>';

while ($designation_row = mysqli_fetch_assoc($designation_qry)) {
    $output .= '<option value="' . $designation_row['DesignationCode'] . '">' . $designation_row['DesignationName'] . '</option>';
}

echo $output;
