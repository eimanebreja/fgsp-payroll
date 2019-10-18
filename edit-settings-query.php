<?php
include_once 'dbcon.php';
if (isset($_POST['edit_payroll'])) {
    $date_id = $_POST['date_id'];
    $pay_sched = $_POST['payroll_sched'];
    $cut_sched = $_POST['cutoff'];

    $result_pay = mysqli_query($mysqli, "UPDATE tbl_date SET payroll_sched='$pay_sched', cutoff_sched='$cut_sched' WHERE date_id='$date_id'");
     ?>
<?php
echo "<script>alert('Successfully update payroll settings!')</script>";
    echo "<script>window.open('payroll.php?id=1','_self')</script>";
}
?>