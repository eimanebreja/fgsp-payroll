<?php
include_once 'dbcon.php';
if (isset($_POST['expense_btn_other'])) {
    $expense_category = $_POST['expense_categories'];
    $months = $_POST['months'];
    $due_dates = $_POST['due_dates'];
    $expensess = $_POST['expensess'];
    $payables = $_POST['payables'];
    $check_numbers = $_POST['check_numbers'];
    $quantity_other = $_POST['quantity_other'];
    $tin_other = $_POST['tin_other'];
    $amounts = $_POST['amounts'];
     
    $result_other_expenses = mysqli_query($mysqli, "INSERT INTO tbl_expenses (expenses_category, expenses_month, expenses_date, expenses_name, expenses_payable_to, expenses_amount, expenses_check_number, expenses_quantity, expenses_tin_number)
    VALUES('$expense_category', '$months', '$due_dates', '$expensess', '$payables', '$amounts', '$check_numbers', '$quantity_other', '$tin_other')");
    

    echo "<script>alert('You successfully add expenses!')</script>";
    echo "<script>window.open('expenses-list.php','_self')</script>";
    ?>

<?php
}
?>