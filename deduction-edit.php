<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['id'];
$result_emp_deduc = mysqli_query($mysqli, "SELECT * FROM tbl_overview LEFT JOIN tbl_employee on tbl_overview.emp_no = tbl_employee.emp_no WHERE tbl_overview.over_id = '$get_id'");
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FGSP Payroll</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"
        rel="stylesheet" media="screen,projection" />
</head>

<body id="dashboard">

    <?php include 'nav.php'; ?>

    <section>
        <div class="container-area">
            <?php include('left-sidenav.php') ?>
            <div class="area-content">
                <div class="add-emp">
                    Update Employee Deduction
                </div>
                <div class="add-employee-form">
                    <form method="POST" action="edit-deduction-query.php">
                        <?php
$i = 1;
while ($emp_deduc_row = mysqli_fetch_array($result_emp_deduc)) {
    $emp_no = $emp_deduc_row['emp_no'];

    ?>
                        <div class="form-label pad">
                            Employee :
                        </div>
                        <div class="form-input">
                            <input name="over_id" type="hidden" class="validate"
                                value="<?php echo $emp_deduc_row['over_id']; ?>">
                            <input type="text" disabled name="emp_name"
                                value="<?php echo $emp_deduc_row['emp_name']; ?>" placeholder=" Enter employee..." />
                        </div>

                        <div class="form-label pad">
                            Late :
                        </div>
                        <div class="form-input">
                            <input type="text" name="late" value="<?php echo $emp_deduc_row['deduc_late']; ?>"
                                placeholder="Enter late deduction..." />
                        </div>
                        <div class="form-label pad">
                            Undertime :
                        </div>
                        <div class="form-input">
                            <input type="text" name="undertime" value="<?php echo $emp_deduc_row['deduc_undertime']; ?>"
                                placeholder="Enter undertime deduction..." />
                        </div>
                        <div class="form-label pad">
                            Absent :
                        </div>
                        <div class="form-input">
                            <input type="text" name="absent" value="<?php echo $emp_deduc_row['deduc_absent']; ?>"
                                placeholder="Enter absent deduction..." />
                        </div>

                        <div class="form-label pad">
                            HDMF :
                        </div>
                        <div class="form-input">
                            <input type="text" name="pagibig" value="<?php echo $emp_deduc_row['deduc_pagibig']; ?>"
                                placeholder="Enter HDMF deduction..." />
                        </div>

                        <div class="form-label pad">
                            SSS :
                        </div>
                        <div class="form-input">
                            <input type="text" name="sss" value="<?php echo $emp_deduc_row['deduc_sss']; ?>"
                                placeholder="Enter SSS deduction..." />
                        </div>

                        <div class="form-label pad">
                            PHILHEALTH :
                        </div>
                        <div class="form-input">
                            <input type="text" name="philhealth"
                                value="<?php echo $emp_deduc_row['deduc_philhealth']; ?>"
                                placeholder="Enter PHILHEALTH deduction..." />
                        </div>

                        <div class="form-label pad">
                            Tax :
                        </div>
                        <div class="form-input">
                            <input type="text" name="tax" value="<?php echo $emp_deduc_row['deduc_tax']; ?>"
                                placeholder="Enter TAX deduction..." />
                        </div>


                        <div class="form-button">
                            <button class="btn-add" name="edit_deduc">SUBMIT</button>
                        </div>
                        <?php } ?>
                    </form>

                </div>
            </div>
            <?php include('right-sidenav.php') ?>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>

    <!-- <script>
    $(document).ready(function() {
        // Set trigger and container variables
        var trigger = $('.menu-area .menu-icon span a'),
            container = $('.area-content');

        // Fire on click
        trigger.on('click', function() {
            // Set $this for re-use. Set target from data attribute
            var $this = $(this),
                target = $this.data('target');

            // Load target page into container
            container.load(target + '.php');

            // Stop normal link behavior
            return false;
        });
    });
    </script> -->

</body>

</html>