<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$get_id = $_GET['months'];
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_months = mysqli_query($mysqli, "SELECT DISTINCT(expenses_month) FROM tbl_expenses WHERE expenses_month = '$get_id'");
$result_report_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '2' AND expenses_month = '$get_id'");
$result_report_other_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '3' AND expenses_month = '$get_id'");

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
    <div class="expenses-report">
        <div class="expenses-logo">
            <img src="image/fgsp_logo.png" alt="">
        </div>
        <?php         
                while ($mt_row = mysqli_fetch_array($result_months)) {     
                ?>
        <div class="expenses-title">
            <?php echo $mt_row['expenses_month']; ?> Expenses
        </div>
        <?php } ?>

        <div class="expenses-report-body">
            <div class="print-btn">
                <button onclick="myFunction()">PRINT</button>
            </div>

            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th class="numberline">No.</th>
                    <th>DUE DATE</th>
                    <th>EXPENSES</th>
                    <th>PAYABLE TO</th>
                    <th>CHECK NUMBER</th>
                    <th>PAYABLE DATE</th>
                    <th>AMOUNT</th>
                </tr>
                <?php  
                          $i=1;       
                while ($report_expenses = mysqli_fetch_array($result_report_expenses)) {
                    ?>
                <tr>
                    <td><?php echo "$i."; ?></td>
                    <td><?php echo $report_expenses['expenses_date']; ?></td>
                    <td><?php echo $report_expenses['expenses_name']; ?></td>
                    <td><?php echo $report_expenses['expenses_payable_to']; ?></td>
                    <td><?php echo $report_expenses['expenses_check_number']; ?></td>
                    <td><?php echo $report_expenses['check_payment_date']; ?></td>
                    <td><?php echo $report_expenses['expenses_amount']; ?></td>
                </tr>
                <?php $i++; } ?>
            </table>

            <div class="other-expenses-text">
                OTHER EXPENSES
            </div>

            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th class="numberline">No.</th>
                    <th>DATE</th>
                    <th>PURPOSE</th>
                    <th>PAYABLE TO</th>
                    <th>QUANTITY</th>
                    <th>CHECK NUMBER</th>
                    <th>TIN NUMBER</th>
                    <th>TOTAL</th>

                </tr>
                <?php  
                          $i=1;       
                while ($months_other_expenses = mysqli_fetch_array($result_report_other_expenses)) {
                    ?>
                <tr>
                    <td><?php echo "$i."; ?></td>
                    <td><?php echo $months_other_expenses['expenses_date']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_name']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_payable_to']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_quantity']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_check_number']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_tin_number']; ?></td>
                    <td><?php echo $months_other_expenses['expenses_amount']; ?></td>
                </tr>

                </tr>
                <?php $i++;} ?>
            </table>


        </div>


    </div>







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

    <script>
    function myFunction() {
        window.print();
    }
    </script>

</body>

</html>