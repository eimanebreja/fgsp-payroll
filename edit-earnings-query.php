<?php
include_once 'dbcon.php';
if (isset($_POST['edit_earn'])) {
    $over_id = $_POST['over_id'];
    $emp_salary = $_POST['salary'];
    $emp_allowance = $_POST['allowance'];
    $emp_incentives = $_POST['incentives'];
    $emp_reimburse = $_POST['reimburse'];
    $emp_overtime = $_POST['overtime'];
    $emp_total_earn = $_POST['salary'] + $_POST['overtime'] + $_POST['reimburse'] + $_POST['incentives'] + $_POST['allowance'];
 
    $result = mysqli_query($mysqli, "UPDATE tbl_overview SET earn_salary='$emp_salary', earn_allowance='$emp_allowance', earn_incentives='$emp_incentives', earn_reimburse='$emp_reimburse', earn_overtime='$emp_overtime', earn_total='$emp_total_earn' WHERE over_id='$over_id'");
?>
<?php
echo "<script>alert('Employee's earning is successfully updated!')</script>";
    echo "<script>window.open('payroll.php?id=1','_self')</script>";
}
?>