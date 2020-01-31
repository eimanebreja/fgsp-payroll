<?php
    include_once 'dbcon.php';
    $id=$_GET['id'];

    $results = mysqli_query($mysqli, "DELETE FROM tbl_expenses WHERE expenses_id='$id'");

    echo "<script>alert('Expenses Deleted')</script>";
    echo "<script>window.open('expenses-list.php?id=1','_self')</script>";

?>