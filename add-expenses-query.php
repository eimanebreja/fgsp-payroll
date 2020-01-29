<?php
include_once 'dbcon.php';
if (isset($_POST['expense_btn'])) {
    $expense_category = $_POST['expense_categories'];
    $expense_ref = $_POST['reference'];
    $month = $_POST['month'];
    $due_date = $_POST['due_date'];
    $expenses = $_POST['expenses'];
    $payable = $_POST['payable'];
    $check_number = $_POST['check_number'];
    $payment_date = $_POST['payment_date'];
    $amount = $_POST['amount'];
    
    $result_expenses = mysqli_query($mysqli, "INSERT INTO tbl_expenses (expenses_reference, expenses_category, expenses_month, expenses_date, expenses_name, expenses_payable_to, expenses_amount, expenses_check_number, check_payment_date)
    VALUES('$expense_ref','$expense_category', '$month', '$due_date', '$expenses', '$payable', '$amount', '$check_number', '$payment_date')");


    echo "<script>alert('You successfully add expenses!')</script>";
    echo "<script>window.open('expenses-list-view.php?months=$month','_self')</script>";
    ?>

<?php
}
?>