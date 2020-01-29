<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);

$get_id = $_GET['id'];
$result_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses where expenses_id='$get_id'");


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
                <div class="event-title-header">
                    Edit Cash Expenses
                </div>

                <div class="event-body-area">
                    <form action="expenses-cash-edit-query.php" method="POST">
                        <?php
                            $i = 1;
                            while ($expenses_row = mysqli_fetch_array($result_expenses)) {
                                $expenses_id = $expenses_row['expenses_id'];
                                $expenses_month = $expenses_row['expenses_month'];

                                ?>
                        <div class="event-label">
                            Reference No :
                        </div>
                        <div class="event-input">
                            <input type="hidden" name="ex_id" value="<?php echo $expenses_row['expenses_id']; ?>">
                            <input type="text" name="ex_ref" value="<?php echo $expenses_row['expenses_reference']; ?>">
                        </div>
                        <div class="event-label">
                            Due Date :
                        </div>
                        <div class="event-input">
                            <input id="ex_date" type="text" name="ex_date"
                                value="<?php echo $expenses_row['expenses_date']; ?>">
                        </div>
                        <div class="event-label">
                            Purpose :
                        </div>
                        <div class="event-input">
                            <input type="text" name="ex_item" value="<?php echo $expenses_row['expenses_name']; ?>">
                        </div>
                        <div class="event-label">
                            Payable To :
                        </div>
                        <div class="event-input">
                            <input type="text" name="ex_payto"
                                value="<?php echo $expenses_row['expenses_payable_to']; ?>">
                        </div>
                        <div class="event-label">
                            Quantity :
                        </div>
                        <div class="event-input">
                            <input type="text" name="ex_quantity"
                                value="<?php echo $expenses_row['expenses_quantity']; ?>">
                        </div>
                        <div class="event-label">
                            TIN Number :
                        </div>
                        <div class="event-input">
                            <input type="text" name="ex_tin"
                                value="<?php echo $expenses_row['expenses_tin_number']; ?>">
                        </div>
                        <div class="event-label">
                            Amount :
                        </div>
                        <div class="event-input">
                            <input type="text" name="ex_amount" value="<?php echo $expenses_row['expenses_amount']; ?>">
                        </div>
                        <div class="event-button">
                            <button name="expenses_btn">SUBMIT</button> <a id="<?php echo $expenses_month; ?>"
                                href="expenses-list-view.php<?php echo '?months=' . $expenses_month; ?>"> BACK</a>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(function() {
        $('input[id$=ex_date]').datepicker({
            dateFormat: 'MM d, yy'
        });
        $('input[id$=ex_paydate]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    </script>


</body>



</html>