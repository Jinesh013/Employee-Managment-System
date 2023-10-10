<?php
include '../includes/dbconnection.php';
$Comcode_id =   $_POST['Comcode_data'];

$branch = "SELECT * FROM branchmaster WHERE CompanyCode = $Comcode_id";
echo $branch;
$branch_qry = mysqli_query($con, $branch);
// $output="";
$output = '<option value="" selected disabled>Choose a Branch</option>';
while ($branch_row = mysqli_fetch_assoc($branch_qry)) {
    $output .= '<option value="' . $branch_row['BranchCode'] . '">' . $branch_row['BranchName'] . '</option>';
}
echo $output;