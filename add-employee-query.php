<?php
include_once 'dbcon.php';
if (isset($_POST['add_emp'])) {
    $emp_code = $_POST['emp_no'];
    $emp_name = $_POST['fname'].' '. $_POST['mname']. ' ' . $_POST['lname'];
    $emp_dhire = $_POST['hire'];

    $result = mysqli_query($mysqli, "INSERT INTO tbl_employee (emp_no, emp_name, emp_dhired)
    VALUES('$emp_code', '$emp_name', '$emp_dhire')");

    $result_salary = mysqli_query($mysqli, "INSERT INTO tbl_salary (emp_no)
    VALUES('$emp_code')");


    echo "<script>alert('You successfully added one Employee!')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";
    ?>

<?php
}
?>