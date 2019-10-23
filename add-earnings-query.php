<?php
include_once 'dbcon.php';
if (isset($_POST['add_earn'])) {
    $emp_no = $_POST['emp_no'];
    $emp_salary = $_POST['salary'];
    $emp_allowance = $_POST['allowance'];
    $emp_overtime= $_POST['overtime']; 
    $emp_incentives = $_POST['incentives'];
    $emp_reimburse = $_POST['reimburse'];
    $earn_total = $_POST['salary'] +  $_POST['allowance'] + $_POST['overtime'] + $_POST['incentives'] + $_POST['reimburse'];

    // $result = mysqli_query($mysqli, "INSERT INTO tbl_earnings (emp_no, earn_salary, earn_allowance, earn_overtime, earn_incentives, earn_reimburse, earn_total)
    // VALUES('$emp_no', '$emp_salary', '$emp_allowance', '$emp_overtime', '$emp_incentives', '$emp_reimburse', '$earn_total')");

    $result_salary = mysqli_query($mysqli, "UPDATE tbl_overview SET earn_salary='$emp_salary', earn_allowance='$emp_allowance' , earn_overtime='$emp_overtime', earn_incentives='$emp_incentives', earn_reimburse='$emp_reimburse', earn_total='$earn_total' WHERE emp_no='$emp_no'");

    // $result_salary = mysqli_query($mysqli, "UPDATE tbl_salary SET earn_total='$earn_total' WHERE emp_no='$emp_no'");

    echo "<script>alert('You successfully added one employee's earning!')</script>";
    echo "<script>window.open('employee-earning.php','_self')</script>";
    ?>

<?php
}
?>