<?php
    include_once 'dbcon.php';
    $id=$_GET['id'];

    $result = mysqli_query($mysqli, "DELETE FROM tbl_employee WHERE emp_id='$id'");

    echo "<script>alert('Employee Deleted')</script>";
    echo "<script>window.open('list-employee.php?id=1234','_self')</script>";
?>