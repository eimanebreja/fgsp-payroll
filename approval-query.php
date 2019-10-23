<?php
    include_once 'dbcon.php';
    $id=$_GET['id'];
    $approved = 'Approved';

    $result = mysqli_query($mysqli, "UPDATE tbl_overview SET salary_status='$approved' WHERE over_id='$id'");
    $result = mysqli_query($mysqli, "UPDATE tbl_salary SET salary_status='$approved' WHERE over_id='$id'");

    echo "<script>alert('Employee's earning is successfully updated!')</script>";
    echo "<script>window.open('payroll.php?id=1','_self')</script>";

?>