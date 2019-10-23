<?php
include_once 'dbcon.php';
if (isset($_POST['add_deduc'])) {
    $emp_no = $_POST['emp_no'];
    $emp_late = $_POST['late'];
    $emp_undertime= $_POST['undertime']; 
    $emp_absent = $_POST['absent'];
    $emp_pagibig = $_POST['pagibig'];
    $emp_sss = $_POST['sss'];
    $emp_philhealth = $_POST['philhealth'];
    $emp_tax = $_POST['tax'];
    $deduc_total = $_POST['late'] + $_POST['undertime'] + $_POST['absent'] + $_POST['pagibig'] + $_POST['sss'] + $_POST['philhealth'] + $_POST['tax'];

    // $result = mysqli_query($mysqli, "INSERT INTO tbl_deduction (emp_no, deduc_late, deduc_undertime, deduc_absent, deduc_pagibig, deduc_sss, deduc_philhealth, deduc_tax, deduc_total)
    // VALUES('$emp_no', '$emp_late', '$emp_undertime', '$emp_absent', '$emp_pagibig', '$emp_sss', '$emp_philhealth', '$emp_tax', '$deduc_total')");

    $result_salary = mysqli_query($mysqli, "UPDATE tbl_overview SET deduc_late='$emp_late', deduc_undertime='$emp_undertime' , deduc_absent='$emp_absent', deduc_pagibig='$emp_pagibig', deduc_sss='$emp_sss', deduc_philhealth='$emp_philhealth', deduc_tax='$emp_tax', deduc_total='$deduc_total' WHERE emp_no='$emp_no'");

    echo "<script>alert('You successfully added one employee's deduction!')</script>";
    echo "<script>window.open('employee-deduction.php','_self')</script>";
    ?>

<?php
}
?>