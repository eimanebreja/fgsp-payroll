<?php
include_once 'dbcon.php';
if (isset($_POST['edit_emps'])) {
    // $emp_code = $_POST['emp_no'];
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['fullname'];
    $emp_email = $_POST['email'];
    $phone = $_POST['phone'];
    $hire = $_POST['hire'];
    $position = $_POST['position'];
    $bday = $_POST['bday'];
    $bdo = $_POST['bdo'];
    $philhealth = $_POST['philhealth'];
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $tin = $_POST['tin'];
    $guardian = $_POST['guardian'];
    $gphone = $_POST['gphone'];

$edit_employee = mysqli_query($mysqli, "UPDATE tbl_employee SET emp_name='$emp_name', emp_position='$position', emp_dhired='$hire', emp_email='$emp_email', emp_contact='$phone', emp_bday='$bday', emp_philhealth='$philhealth', emp_sss='$sss', emp_pagibig='$pagibig', emp_tin='$tin', emp_ecp='$guardian', emp_ecp_no='$gphone', emp_bdo_account='$bdo' WHERE emp_id='$emp_id'");

    echo "<script>alert('You successfully edit one Employee!')</script>";
    echo "<script>window.open('list-employee-view.php?id=$emp_id','_self')</script>";
    ?>

<?php
}
?>