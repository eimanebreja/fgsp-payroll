<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['date'];
$transac_date = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id WHERE tbl_salary.payroll_sched = '$get_id'");
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$result_date = mysqli_query($mysqli, "SELECT DISTINCT(tbl_salary.payroll_sched) FROM tbl_salary LEFT JOIN tbl_overview ON tbl_overview.over_id = tbl_salary.over_id LEFT JOIN tbl_employee ON tbl_employee.emp_no = tbl_salary.emp_no WHERE tbl_salary.payroll_sched = '$get_id'");
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
                <?php         
                while ($date_row = mysqli_fetch_array($result_date)) {
                  
                    ?>
                <div class="add-emp">
                    Payroll Transaction in <?php echo $date_row['payroll_sched']; ?>
                </div>
                <?php } ?>

                <div class="trans-area">
                    <?php 
                    $no=1; 
                    while ($paydate_row = mysqli_fetch_array($transac_date)) {
                        $id = $paydate_row['over_id']; 
                        ?>
                    <div class="transac-list">
                        <span> <?php echo "$no" ?>.</span>
                        <a id="<?php echo $id; ?>" href="payroll-view.php<?php echo '?id=' . $id; ?>">
                            <?php echo $paydate_row['emp_name']; ?> </a>
                    </div>
                    <?php $no++; } ?>
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