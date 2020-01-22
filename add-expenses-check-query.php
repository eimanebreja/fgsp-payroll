<?php
include_once 'dbcon.php';
if (isset($_POST['check_expense_btn_other'])) {
    $expense_ref = $_POST['reference'];
    $expense_category = $_POST['expense_categories'];
    $months = $_POST['check_months'];
    $due_dates = $_POST['check_due_dates'];
    $expensess = $_POST['check_expensess'];
    $payables = $_POST['check_payables'];
    $check_numbers = $_POST['check_check_numbers'];
    $quantity_other = $_POST['check_quantity_other'];
    $tin_other = $_POST['check_tin_other'];
    $amounts = $_POST['check_amounts'];
     
    $result_other_expenses = mysqli_query($mysqli, "INSERT INTO tbl_expenses (expenses_reference, expenses_category, expenses_month, expenses_date, expenses_name, expenses_payable_to, expenses_amount, expenses_quantity, expenses_tin_number, expenses_check_number)
    VALUES('$expense_ref', '$expense_category', '$months', '$due_dates', '$expensess', '$payables', '$amounts', '$quantity_other', '$tin_other', '$check_numbers')");
    

    echo "<script>alert('You successfully add expenses!')</script>";
    echo "<script>window.open('expenses-list.php','_self')</script>";
    ?>

<?php
}
?>