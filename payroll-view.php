<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['id'];
$result_salary = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_earnings on tbl_salary.earn_total = tbl_earnings.earn_total LEFT JOIN tbl_deduction on tbl_salary.deduc_total = tbl_deduction.deduc_total WHERE tbl_salary.emp_no = '$get_id'");
$result_date = mysqli_query($mysqli, "SELECT * FROM tbl_date");
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
            <?php
            $i = 1;
            while ($payroll_row = mysqli_fetch_array($result_salary)) {$id = $payroll_row['emp_no'];?>
            <div class="payroll-view">
                <div class="logo">
                    <img src="image/fgsp_logo2.png" alt="">
                </div>
                <div class="employee-info">
                    <div class="info-area">
                        <div class="info-flex">
                            <div class="name">
                                Employee Name : <?php echo $payroll_row['emp_name']; ?>
                            </div>
                            <div class="position">
                                Designation : <?php echo $payroll_row['emp_position']; ?>
                            </div>
                        </div>
                        <div class="info-flex">
                            <?php
            $i = 1;
            while ($date_row = mysqli_fetch_array($result_date)) {$id = $date_row['date_id'];?>
                            <div class="name">
                                Payroll Schedule : <?php echo $date_row['payroll_sched']; ?>
                            </div>
                            <div class="position">
                                Cut off : <?php echo $date_row['cutoff_sched']; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php } ?>


        </div>
        <!-- <button onClick="window.print()">Print this page</button> -->
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>



</body>

</html>