<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_date = mysqli_query($mysqli, "SELECT DISTINCT(tbl_salary.payroll_sched) FROM tbl_salary LEFT JOIN tbl_overview ON tbl_overview.over_id = tbl_salary.over_id LEFT JOIN tbl_employee ON tbl_employee.emp_no = tbl_salary.emp_no ORDER BY tbl_salary.payroll_sched DESC");
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
                        Payroll Transaction
                    </div>
                    <div class="transac-cnt">
                        <div class="title">
                            PAYROLL SCHEDULE
                        </div>
                        <?php
                            while ($date_row = mysqli_fetch_array($result_date)) {
                            $date = $date_row['payroll_sched']; 
                            ?>
                        <div class="cont-date">
                            <a id="<?php echo $date; ?>" href="transaction-view.php<?php echo '?date=' . $date; ?>">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <?php echo $date_row['payroll_sched']; ?> </a>
                            <a id="<?php echo $date; ?>"
                                href="transaction-view-report.php<?php echo '?date=' . $date; ?>">
                                <span>
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </span>
                                REPORT</a>
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