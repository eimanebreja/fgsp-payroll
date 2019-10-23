<?php
include_once 'dbcon.php';
if (isset($_POST['add_emp'])) {
    $emp_code = $_POST['emp_no'];
    $emp_name = $_POST['fname'].' '. $_POST['mname']. ' ' . $_POST['lname'];
    $emp_position = $_POST['position'];
    $emp_dhire = $_POST['hire'];
    $pays_sched = $_POST['payroll_scheds'];
	$pay_cutoff = $_POST['cutoff_sched'];

    $result_overview = mysqli_query($mysqli, "INSERT INTO tbl_overview (over_id, emp_no, salary_status)
    VALUES('null', '$emp_code', 'Pending')");
    
    $last_id = mysqli_insert_id($mysqli);
    $result_salary = mysqli_query($mysqli, "INSERT INTO tbl_salary (emp_no, over_id, salary_status, payroll_sched, cutoff_sched)
    VALUES('$emp_code', '$last_id', 'Pending', '$pays_sched', '$pay_cutoff')");

    $result = mysqli_query($mysqli, "INSERT INTO tbl_employee (emp_no, emp_name, emp_position, emp_dhired)
    VALUES('$emp_code', '$emp_name', '$emp_position', '$emp_dhire')");

    echo "<script>alert('You successfully added one Employee!')</script>";
    echo "<script>window.open('payroll.php','_self')</script>";
    ?>

<?php
}
?>