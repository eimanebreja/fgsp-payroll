<?php
include_once 'dbcon.php';
if (isset($_POST['edit_earn'])) {
    $emp_no = $_POST['emp_no'];
    $emp_salary = $_POST['salary'];
    $emp_allowance = $_POST['allowance'];
    $emp_incentives = $_POST['incentives'];
    $emp_reimburse = $_POST['reimburse'];
    $emp_overtime = $_POST['overtime'];
    $emp_total_earn = $_POST['salary'] + $_POST['overtime'] + $_POST['reimburse'] + $_POST['incentives'] + $_POST['allowance'];
 
    $result = mysqli_query($mysqli, "UPDATE tbl_earnings SET earn_salary='$emp_salary', earn_allowance='$emp_allowance', earn_incentives='$emp_incentives', earn_reimburse='$emp_reimburse', earn_overtime='$emp_overtime', earn_total='$emp_total_earn' WHERE emp_no='$emp_no'");
    $result_salary = mysqli_query($mysqli, "UPDATE tbl_salary SET earn_total='$emp_total_earn' WHERE emp_no='$emp_no'"); ?>
<?php
echo "<script>alert('Employee's earning is successfully updated!')</script>";
    echo "<script>window.open('employee-earning.php?id=1','_self')</script>";
}
?>