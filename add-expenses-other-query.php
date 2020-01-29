<?php
include_once 'dbcon.php';
if (isset($_POST['expense_btn_other'])) {
    $expense_ref = $_POST['reference'];
    $expense_category = $_POST['expense_categories'];
    $months = $_POST['months'];
    $due_dates = $_POST['due_dates'];
    $expensess = $_POST['expensess'];
    $payables = $_POST['payables'];
    // $check_numbers = $_POST['check_numbers'];
    $quantity_other = $_POST['quantity_other'];
    $tin_other = $_POST['tin_other'];
    $amounts = $_POST['amounts'];
    
    $result_other_expenses = "INSERT INTO tbl_expenses (expenses_reference, expenses_category, expenses_month, expenses_date, expenses_name, expenses_payable_to, expenses_amount, expenses_quantity, expenses_tin_number)
    VALUES('$expense_ref', '$expense_category', '$months', '$due_dates', '$expensess', '$payables', '$amounts', '$quantity_other', '$tin_other')";
    mysqli_query($mysqli, $result_other_expenses);
    

    echo "<script>alert('You successfully add expenses!')</script>";
    echo "<script>window.open('expenses-list-view.php?months=$months','_self')</script>";
    ?>

<?php
}
?>