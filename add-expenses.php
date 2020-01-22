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
                            <input type="radio" name="expense_category" value="3" /> Cash Expenses
                        </div>
                        <div class="radio">
                            <input type="radio" name="expense_category" value="4" /> Check Expenses
                        </div>
                    </div>
                    <div id="Expense2" class="expense-label-input desc">
                        <form action="add-expenses-query.php" method="POST">
                            <input type="hidden" name="expense_categories" checked="checked" value="2" />
                            <?php
                            include_once "dbcon.php";
                            $result_expenses_ref = mysqli_query($mysqli, "SELECT LPAD(expenses_reference, 3, '0') AS code FROM tbl_expenses ORDER BY expenses_id DESC LIMIT 1");
                            $i = 1;
                            while ($ref_row = mysqli_fetch_array($result_expenses_ref)) {
                            $id = $ref_row['code'];
                            $code_sum = $id + 1;
                            $codes = str_pad($code_sum, 3, "0", STR_PAD_LEFT);
                            ?>
                            <div class="expense-label">
                                Reference No
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter reference..." name="reference" value="<?php echo $codes; ?>"
                                    class="month" type="text" required>
                            </div>
                            <?php } ?>
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
                        <form id="add_sharings">
                            <input type="hidden" name="expense_categories" value="3" />
                            <?php
                            include_once "dbcon.php";
                            $result_expenses_ref = mysqli_query($mysqli, "SELECT LPAD(expenses_reference, 3, '0') AS code FROM tbl_expenses ORDER BY expenses_id DESC LIMIT 1");
                            $i = 1;
                            while ($ref_row = mysqli_fetch_array($result_expenses_ref)) {
                            $id = $ref_row['code'];
                            $code_sum = $id + 1;
                            $codes = str_pad($code_sum, 3, "0", STR_PAD_LEFT);
                            ?>
                            <div class="expense-label">
                                Reference No
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter reference..." name="reference" value="<?php echo $codes; ?>"
                                    class="month" type="text" required>
                            </div>
                            <?php } ?>
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
                            <div class="expense-label">
                                Shared Items
                            </div>
                            <div class="sharing-items" id="dynamic_field">
                                <div class="sharing-expense-input">
                                    <input placeholder="Enter items" name="share_items[]" type="text" required>
                                </div>
                                <div class="price-expense-input">
                                    <input placeholder="Enter price" name="price[]" type="text" required>
                                </div>

                                <div class="sharing-add-button">
                                    <button type="button" name="add" id="add" class="btn-shared"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="expense-button">
                                <button id="submit" name="expense_btn_other">SUBMIT</button>
                            </div>
                        </form>
                    </div>

                    <div id="Expense4" class="expense-label-input desc" style="display:none">
                        <form action="add-expenses-check-query.php" method="POST">
                            <input type="hidden" name="expense_categories" value="4" />

                            <div class="expense-label">
                                Reference No
                            </div>
                            <div class="expense-input">
                                <select name="reference" id="" class="month" required>
                                    <?php
                            include_once "dbcon.php";
                            $result_expenses_ref = mysqli_query($mysqli, "SELECT expenses_reference FROM tbl_expenses");
                            $i = 1;
                            while ($ref_row = mysqli_fetch_array($result_expenses_ref)) {
                            $reference = $ref_row['expenses_reference'];
                         
                            ?>
                                    <option value=""><?php echo $reference; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="expense-label">
                                Month
                            </div>
                            <div class="expense-input">
                                <!-- <input type="text"> -->
                                <input placeholder="Enter month..." name="check_months" class="month" id="month_check"
                                    type="text" required>
                            </div>
                            <div class="expense-label">
                                Date
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter date..." name="check_due_dates" id="due_date_check"
                                    type="text" required>
                            </div>
                            <div class="expense-label">
                                Purpose/Item
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter purpose or item..." name="check_expensess" type="text"
                                    required>
                            </div>
                            <div class="expense-label">
                                Company/Paid to
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter company/paid to" name="check_payables" type="text">
                            </div>
                            <div class="expense-label">
                                Quantity
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter quantity..." name="check_quantity_other" type="text">
                            </div>
                            <div class="expense-label">
                                Check Number
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter check number" name="check_check_numbers" type="text">
                            </div>
                            <div class="expense-label">
                                TIN Number
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter TIN number..." name="check_tin_other" type="text">
                            </div>
                            <div class="expense-label">
                                Total
                            </div>
                            <div class="expense-input">
                                <input placeholder="Enter total..." name="check_amounts" type="text" required>
                            </div>
                            <div class="expense-button">
                                <button name="check_expense_btn_other">SUBMIT</button>
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
        $('input[id$=due_date_check]').datepicker({
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
        $('input[id$=month_check]').datepicker({
            dateFormat: 'MM yy'
        });
    });
    $(function() {
        $('input[id$=payment]').datepicker({
            dateFormat: 'MM d, yy'
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
    <script>
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            var html = '';
            html += '<div class="remove-content">';
            html += '<div class="sharing-items">';
            html += ' <div class="sharing-expense-input">';
            html += '<input placeholder="Enter items" name="share_items[]" type="text" required>';
            html += '</div>';
            html += ' <div class="price-expense-input">';
            html += ' <input placeholder="Enter price" name="price[]" type="text" required>';
            html += '</div>';
            html += ' <div class="sharing-add-button">';
            html +=
                '<button type="button" name="remove" class="btn-shared-delete remove"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#dynamic_field').append(html);
        });
        $(document).on('click', '.remove', function() {
            $(this).closest('.remove-content').remove();
        });

        $('#submit').click(function() {
            e.preventDeafault();
            $.ajax({
                async: true,
                url: "add-expenses-other-query.php",
                method: "POST",
                data: $('#add_sharings').serialize(),
                success: function(rt) {
                    alert(rt);
                    $('#add_sharings')[0].reset();
                }
            });
        });
    });
    </script>





</body>



</html>