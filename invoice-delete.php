<?php
    include_once 'dbcon.php';
    
    $id=$_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM tbl_invoice WHERE invoice_number='$id'");
    $result = mysqli_query($mysqli, "DELETE FROM tbl_convert WHERE invoice_number='$id'");

    echo "<script>alert('Invoice Deleted')</script>";
    echo "<script>window.open('invoice-list.php?id=1','_self')</script>";

?>