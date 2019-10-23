<?php
    include_once 'dbcon.php';
    $id=$_GET['id'];
    $approved = 'Approved';



    $result = mysqli_query($mysqli, "UPDATE tbl_salary SET transac_status='1' WHERE over_id='$id'");

    echo "<script>alert('Employee's earning is successfully updated!')</script>";
    echo "<script>window.open('approved-payroll.php?id=1','_self')</script>";

?>