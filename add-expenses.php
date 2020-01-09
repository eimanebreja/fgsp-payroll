<?php include 'session.php';?>
<?php

include_once "dbcon.php";

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body id="dashboard">

    <?php include 'nav.php'; ?>

    <section>
        <div class="container-area">
            <?php include('left-sidenav.php') ?>
            <div class="area-content">
                <div class="expense-title">
                    Add Expenses
                </div>
                <div class="expense-body-area">

                    <div class="expense-radio">
                        <div class="radio">
                            <input type="radio" name="expense_category" checked="checked" value="2" /> Expenses
                        </div>
                        <div class="radio">
                            <input type="radio" name="expense_category" value="3" /> Other Expenses
                        </div>
                    </div>
                    <div id="Expense2" class="expense-label-input desc">
                        <form action="add-expenses-query.php" method="POST">
                            <input type="hidden" name="expense_categories" checked="checked" value="2" />
                            <div class="expense-label">
                                Month
                            </div>
                            <div class="expense-input">
                                <!-- <input type="text"> -->
                                <input placeholder="Enter month..." name="month" class="month" id="month" type="text"
                                    required>
                            </div>
                            <div class="expense-label">
                                Due Date
                            </div>
                            <div class="expense-input">
                                <input id="due_date" placeholder="Enter due date..." name="due_date" type="text"
                                    required>
                            </div>
                            <div class="expense-label">
                                Expenses
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter expenses name..." name="expenses" type="text" required>
                            </div>
                            <div class="expense-label">
                                Payable to
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter payable to..." name="payable" type="text">
                            </div>
                            <div class="expense-label">
                                Check Number
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter check number..." name="check_number" type="text">
                            </div>
                            <div class="expense-label">
                                Paymate Date
                            </div>
                            <div class="expense-input">
                                <input id="payment" placeholder="Enter Paymate Date" name="payment_date" type="text">
                            </div>
                            <div class="expense-label">
                                Amount
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter amount..." name="amount" type="text" required>
                            </div>

                            <div class="expense-button">
                                <button name="expense_btn">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                    <div id="Expense3" class="expense-label-input desc" style="display:none">
                        <form action="add-expenses-other-query.php" method="POST">
                            <input type="hidden" name="expense_categories" value="3" />
                            <div class="expense-label">
                                Month
                            </div>
                            <div class="expense-input">
                                <!-- <input type="text"> -->
                                <input placeholder="Enter month..." name="months" class="month" id="month_other"
                                    type="text" required>
                            </div>
                            <div class="expense-label">
                                Date
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter date..." name="due_dates" id="due_date_other" type="text"
                                    required>
                            </div>
                            <div class="expense-label">
                                Purpose/Item
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter purpose or item..." name="expensess" type="text" required>
                            </div>
                            <div class="expense-label">
                                Company/Paid to
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter company/paid to" name="payables" type="text">
                            </div>
                            <div class="expense-label">
                                Quantity
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter quantity..." name="quantity_other" type="text">
                            </div>
                            <div class="expense-label">
                                Check Number
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter check number" name="check_numbers" type="text">
                            </div>
                            <div class="expense-label">
                                TIN Number
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter TIN number..." name="tin_other" type="text">
                            </div>
                            <div class="expense-label">
                                Total
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter total..." name="amounts" type="text" required>
                            </div>

                            <div class="expense-button">
                                <button name="expense_btn_other">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


            <?php include('right-sidenav.php') ?>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(document).ready(function() {
        $("input[name$='expense_category']").click(function() {
            var test = $(this).val();

            $("div.desc").hide();
            $("#Expense" + test).show();
        });
    });
    </script>
    <script>
    $(function() {
        $('input[id$=due_date]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    $(function() {
        $('input[id$=due_date_other]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    $(function() {
        $('input[id$=month]').datepicker({
            dateFormat: 'MM yy'
        });
    });
    $(function() {
        $('input[id$=month_other]').datepicker({
            dateFormat: 'MM yy'
        });
    });
    $(function() {
        $('input[id$=payment]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    </script>


</body>



</html>