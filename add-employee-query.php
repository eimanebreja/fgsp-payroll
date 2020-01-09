<?php
include_once 'dbcon.php';
if (isset($_POST['add_emp'])) {
    $emp_code = $_POST['emp_no'];
    $emp_name = $_POST['fname'].' '. $_POST['mname']. ' ' . $_POST['lname'];
    $emp_email = $_POST['email'];
    $phone = $_POST['phone'];
    $hire = $_POST['hire'];
    $position = $_POST['position'];
    $bday = $_POST['bday'];
    $bdo = $_POST['bdo'];
    $philhealth = $_POST['philhealth'];
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $tin = $_POST['tin'];
    $guardian = $_POST['guardian'];
    $gphone = $_POST['gphone'];

    $result_error = mysqli_query($mysqli, "SELECT * FROM tbl_employee WHERE emp_no='$emp_code'");
    $count = mysqli_num_rows($result_error);

    if ($count  != 1){
    $result = mysqli_query($mysqli, "INSERT INTO tbl_employee (emp_no, emp_name, emp_position, emp_dhired, emp_email, emp_contact, emp_bday, emp_philhealth, emp_sss, emp_pagibig, emp_tin, emp_ecp, emp_ecp_no, emp_bdo_account, emp_image)
    VALUES('$emp_code', '$emp_name', '$position', '$hire', '$emp_email', '$phone', '$bday', '$philhealth', '$sss', '$pagibig', '$tin', '$guardian', '$gphone', '$bdo', 'upload/no_image.png')");
    echo "<script>alert('You successfully added one Employee!')</script>";
    echo "<script>window.open('list-employee.php','_self')</script>";
    }else{ ?>
<script type="text/javascript">
alert('Employee Already Exist');
</script>
<script>
window.open('add-employee.php', '_self')
</script>

<?php
}
}
?>