<?php
include_once 'dbcon.php';
if (isset($_POST['expenses_btn'])) {
    $ex_id = $_POST['ex_id'];
    $ex_ref = $_POST['ex_ref'];
    $ex_date = $_POST['ex_date'];
    $ex_item = $_POST['ex_item'];
    $ex_payto = $_POST['ex_payto'];
    $ex_check = $_POST['ex_check'];
    $ex_paydate = $_POST['ex_paydate'];
    $ex_amount = $_POST['ex_amount'];
 
    $result = mysqli_query($mysqli, "UPDATE tbl_expenses SET expenses_reference='$ex_ref', expenses_date='$ex_date', expenses_name='$ex_item', expenses_payable_to='$ex_payto', expenses_amount='$ex_amount', expenses_check_number='$ex_check', check_payment_date='$ex_paydate'  WHERE expenses_id='$ex_id'");
?>
<?php
echo "<script>alert('Expenses is successfully updated!')</script>";
    echo "<script>window.open('expenses-edit.php?id=$ex_id','_self')</script>";
}
?>