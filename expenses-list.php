<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_month_date = mysqli_query($mysqli, "SELECT DISTINCT(expenses_month) FROM tbl_expenses ORDER BY expenses_id DESC ");

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
                <div class="expense-title">
                    Monthly Expenses
                </div>
                <div class="expenses-monthly">
                    <ul>
                        <?php
                            while ($month_row = mysqli_fetch_array($result_month_date)) {
                            $months = $month_row['expenses_month']; 
                            ?>
                        <li class="month-report"><a id="<?php echo $months; ?>"
                                href="expenses-list-view.php<?php echo '?months=' . $months; ?>">
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                <?php echo $month_row['expenses_month']; ?></a>

                            <a class="print-anchor" id="<?php echo $months; ?>"
                                href="expenses-list-report.php<?php echo '?months=' . $months; ?>">
                                <span><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                        </li>
                        <?php } ?>
                    </ul>

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