<?php
include_once 'dbcon.php';
if (isset($_POST['edit_deduc'])) {
    $emp_no = $_POST['emp_no'];
    $emp_late = $_POST['late'];
    $emp_undertime= $_POST['undertime']; 
    $emp_absent = $_POST['absent'];
    $emp_pagibig = $_POST['pagibig'];
    $emp_sss = $_POST['sss'];
    $emp_philhealth = $_POST['philhealth'];
    $emp_tax = $_POST['tax'];
    $deduc_total = $_POST['late'] + $_POST['undertime'] + $_POST['absent'] + $_POST['pagibig'] + $_POST['sss'] + $_POST['philhealth'] + $_POST['tax'];
 
    $result = mysqli_query($mysqli, "UPDATE tbl_deduction SET deduc_late='$emp_late', deduc_undertime='$emp_undertime', deduc_absent='$emp_absent', deduc_pagibig='$emp_pagibig', deduc_sss='$emp_sss', deduc_philhealth='$emp_philhealth', deduc_tax='$emp_tax', deduc_total='$deduc_total' WHERE emp_no='$emp_no'");
    $result_salary = mysqli_query($mysqli, "UPDATE tbl_salary SET deduc_total='$deduc_total' WHERE emp_no='$emp_no'");
    ?>

<?php
echo "<script>alert('Employee's deduction is successfully updated!')</script>";
    echo "<script>window.open('employee-deduction.php?id=1','_self')</script>";
}
?>