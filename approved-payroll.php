<?php include 'session.php';?>
<?php

include_once "dbcon.php";

// $result_salaries = mysqli_query($mysqli, "SELECT * FROM tbl_overview LEFT JOIN tbl_employee on tbl_overview.emp_no = tbl_employee.emp_no WHERE tbl_overview.salary_status='Approved'");
$result_salaries = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id WHERE tbl_salary.salary_status='Approved' AND tbl_salary.transac_status='0'");
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_emp = mysqli_query($mysqli, "SELECT * FROM tbl_employee");

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
                <div class="payroll-sec">
                    <div class="add-emp">
                        Approved Payroll
                    </div>
                    <div class="payroll-content">
                        <div class="payroll-head">
                            <div class="name">
                                NAME
                            </div>
                            <div class="salary">
                                GROSS PAY
                            </div>
                            <div class="deduction">
                                TOTAL DEDUCTION
                            </div>
                            <div class="net">
                                NET PAY
                            </div>
                            <div class="action">
                                ACTION
                            </div>
                        </div>
                        <?php
                
                        while ($salary_row = mysqli_fetch_array($result_salaries)) {
                            $id = $salary_row['over_id']; 
                            $earn_total = $salary_row['earn_total']; 
                            $deduc_total = $salary_row['deduc_total']; 
                            $net_pay = $salary_row['earn_total'] - $salary_row['deduc_total']; 
                        
                            ?>
                        <div class="payroll-body">
                            <div class="name">
                                <?php echo $salary_row['emp_name']; ?>
                            </div>
                            <div class="salary">
                                <a id="<?php echo $id; ?>" href="earning-edit.php<?php echo '?id=' . $id; ?>">&#8369;
                                    <?php echo $earn_total; ?> </a>
                            </div>
                            <div class="deduction">
                                <a id="<?php echo $id; ?>" href="deduction-edit.php<?php echo '?id=' . $id; ?>">&#8369;
                                    <?php echo  $deduc_total; ?></a>
                            </div>
                            <div class="net">
                                &#8369; <?php echo $net_pay; ?>
                            </div>
                            <div class="action">
                                <a class="view" id="<?php echo $id; ?>"
                                    href="payroll-view.php<?php echo '?id=' . $id; ?>">
                                    VIEW</a>
                                <a class="remove" id="<?php echo $id; ?>"
                                    href="remove-query.php<?php echo '?id=' . $id; ?>">
                                    REMOVE</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
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