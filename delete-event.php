<?php
    include_once 'dbcon.php';
    $id=$_GET['id'];

    $result = mysqli_query($mysqli, "DELETE FROM tbl_event WHERE event_id='$id'");

    echo "<script>alert('Event Deleted')</script>";
    echo "<script>window.open('dashboard.php?id=1','_self')</script>";

?>