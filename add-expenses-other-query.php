<?php
include 'dbcon.php';
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

for ($i = 0; $i < count($_POST['share_items']); $i++) {
$items_name = mysqli_real_escape_string($mysqli, $_POST['share_items'][$i]);
$price = mysqli_real_escape_string($mysqli, $_POST['price'][$i]);

    if (empty(trim($items_name))) {
        continue;
    }

$result_items = "INSERT INTO tbl_items (item_name, item_price, expenses_reference)
VALUES('$items_name', '$price', '$expense_ref')";
mysqli_query($mysqli, $result_items);

}

$result_other_expenses = "INSERT INTO tbl_expenses (expenses_reference, expenses_category, expenses_month, expenses_date, expenses_name, expenses_payable_to, expenses_amount, expenses_quantity, expenses_tin_number)
VALUES('$expense_ref', '$expense_category', '$months', '$due_dates', '$expensess', '$payables', '$amounts', '$quantity_other', '$tin_other')";
mysqli_query($mysqli, $result_other_expenses);

if (mysqli_error($mysqli)) {
    echo "Data base error occured";
} else {
    echo $i . " rows added, Successful";
}


?>