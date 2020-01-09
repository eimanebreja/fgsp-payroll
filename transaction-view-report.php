<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['date'];
$transac_date = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id WHERE tbl_salary.payroll_sched = '$get_id'");
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$result_date = mysqli_query($mysqli, "SELECT DISTINCT(tbl_salary.payroll_sched) FROM tbl_salary LEFT JOIN tbl_overview ON tbl_overview.over_id = tbl_salary.over_id LEFT JOIN tbl_employee ON tbl_employee.emp_no = tbl_salary.emp_no WHERE tbl_salary.payroll_sched = '$get_id'");
$cut = mysqli_query($mysqli, "SELECT DISTINCT(tbl_salary.cutoff_sched) FROM tbl_salary LEFT JOIN tbl_overview ON tbl_overview.over_id = tbl_salary.over_id LEFT JOIN tbl_employee ON tbl_employee.emp_no = tbl_salary.emp_no WHERE tbl_salary.payroll_sched = '$get_id'");
$user_row = mysqli_fetch_array($result_user);
$sum_salary = mysqli_query($mysqli, "SELECT SUM(tbl_overview.earn_salary) as earn_total, SUM(tbl_overview.earn_incentives) as total_incentives, 
SUM(tbl_overview.earn_allowance) as total_allowance, 
SUM(tbl_overview.earn_reimburse) as total_reimburse, 
SUM(tbl_overview.earn_overtime) as total_overtime, 
SUM(tbl_overview.deduc_late) + SUM(tbl_overview.deduc_absent) as total_lateabsent,
SUM(tbl_overview.earn_total) as total_earn,
SUM(tbl_overview.deduc_sss) as total_sss,
SUM(tbl_overview.deduc_philhealth) as total_philhealth,
SUM(tbl_overview.deduc_pagibig) as total_pagibig,  
SUM(tbl_overview.deduc_tax) as total_tax, 
SUM(tbl_overview.earn_total) - SUM(tbl_overview.deduc_total) as total_netpay
FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id WHERE tbl_salary.payroll_sched = '$get_id'");

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
        <div class="payroll-report-area">
            <div class="report-title">
                FEEMO GLOBAL SOLUTIONS PHILIPPINES
            </div>
            <?php         
                while ($date_rows = mysqli_fetch_array($result_date)) {    
                    ?>
            <div class="report-payroll-sched">
                PAYROLL SCHEDULE :<span> <?php echo $date_rows['payroll_sched']; ?></span>
            </div>
            <?php } ?>
            <?php         
                while ($date_row = mysqli_fetch_array($cut)) {    
                    ?>
            <div class="report-payroll-sched">
                CUT-OFF : <span><?php echo $date_row['cutoff_sched']; ?></span>
            </div>
            <?php } ?>


            <div class="report-body-area">
                <table cellspacing="0" cellpadding="0" border="1">
                    <tr>
                        <th>No.</th>
                        <th>EMPLOYEE NAME</th>
                        <th>BASIC PAY</th>
                        <th>INCENTIVES</th>
                        <th>REIMBURSEMENT</th>
                        <th>ALLOWANCE</th>
                        <th>OVERTIME</th>
                        <th>LATE/ABSENT</th>
                        <th>GROSS PAY</th>
                        <th>SSS</th>
                        <th>PHIC</th>
                        <th>HDMF</th>
                        <th>W-TAX</th>
                        <th>NETPAY</th>
                    </tr>
                    <?php 
                    $no=1; 
                    while ($paydate_row = mysqli_fetch_array($transac_date)) {
                        $id = $paydate_row['over_id']; 
                        $late = $paydate_row['deduc_late'];
                        $absent = $paydate_row['deduc_absent'];
                        $late_absent = $late + $absent;
                        $earn_total = $paydate_row['earn_total'];
                        $deduc_total =  $paydate_row['deduc_total'];
                        $netpay =  $earn_total -  $deduc_total;
                        ?>
                    <tr>
                        <td><?php echo "$no."; ?></td>
                        <td class="name"><?php echo $paydate_row['emp_name']; ?></td>
                        <td><?php echo $paydate_row['earn_salary']; ?></td>
                        <td><?php echo $paydate_row['earn_incentives']; ?></td>
                        <td><?php echo $paydate_row['earn_reimburse']; ?></td>
                        <td><?php echo $paydate_row['earn_allowance']; ?></td>
                        <td><?php echo $paydate_row['earn_overtime']; ?></td>
                        <td><?php echo  number_format($late_absent, 2); ?></td>
                        <td><?php echo $paydate_row['earn_total']; ?></td>
                        <td><?php echo $paydate_row['deduc_sss']; ?></td>
                        <td><?php echo $paydate_row['deduc_philhealth']; ?></td>
                        <td><?php echo $paydate_row['deduc_pagibig']; ?></td>
                        <td><?php echo $paydate_row['deduc_tax']; ?></td>
                        <td><?php echo  number_format($netpay, 2); ?></td>
                    </tr>
                    <?php $no++;} ?>

                    <?php 
                    $no=1; 
                    while ($sum_row = mysqli_fetch_array($sum_salary)) {?>
                    <tr>
                        <td class="total-area"></td>
                        <td class="total-area"></td>
                        <td class="total-area"><?php echo $sum_row['earn_total']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_incentives']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_reimburse']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_allowance']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_overtime']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_lateabsent']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_earn']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_sss']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_philhealth']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_pagibig']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_tax']; ?></td>
                        <td class="total-area"><?php echo $sum_row['total_netpay']; ?></td>
                    </tr>
                    <?php $no++;} ?>
                </table>

            </div>
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