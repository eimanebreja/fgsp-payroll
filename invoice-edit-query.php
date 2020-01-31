<?php
include_once 'dbcon.php';
if (isset($_POST['invoice_edit'])) {
    $invoice_id = $_POST['invoice_id'];
    $invoice_date = $_POST['invoice_date'];
    $invoice_number = $_POST['invoice_number'];
    $invoice_duedate = $_POST['invoice_duedate'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_contact = $_POST['company_contact'];
    $attention_to = $_POST['attention_to'];
    $attention_position = $_POST['attention_position'];
    $ttsr_number = $_POST['ttsr_number'];
    $ttsr_date = $_POST['ttsr_date'];
    $ttsr_time = $_POST['ttsr_time'];
    $ttsr_remarks = $_POST['ttsr_remarks'];
    $invoice_subtotal = $_POST['invoice_subtotal'];
    $invoice_taxable = $_POST['invoice_taxable'];
    $invoice_rate = $_POST['invoice_rate'];
    $invoice_taxdue = $_POST['invoice_taxdue'];
    $invoice_other = $_POST['invoice_other'];
    $invoice_total = $_POST['invoice_total'];
    $convert_id = $_POST['convert_id'];
$convert_date =  $_POST['convert_date'];
$convert_description = $_POST['convert_description'];
$convert_yen =  $_POST['convert_yen'];
$convert_peso = $_POST['convert_peso'];

$result=mysqli_query($mysqli, "SELECT COUNT(invoice_number) as total from tbl_convert WHERE invoice_number='$invoice_number'");
$data = mysqli_fetch_assoc($result);
// echo $data['total'];
$count = $data['total'];

for ($i=0; $i<$count; $i++) {
    $sql5= "UPDATE tbl_convert SET convert_date='$convert_date[$i]', convert_description='$convert_description[$i]', convert_yen='$convert_yen[$i]', convert_peso='$convert_peso[$i]' WHERE convert_id = '$convert_id[$i]'";
    $run_query = mysqli_query($mysqli,$sql5);
}

$edit_invoice = mysqli_query($mysqli, "UPDATE tbl_invoice SET invoice_date='$invoice_date', invoice_number='$invoice_number', invoice_duedate='$invoice_duedate', company_name='$company_name', company_address='$company_address', company_contact='$company_contact', attention_to='$attention_to', attention_position='$attention_position', ttsr_number='$ttsr_number', ttsr_date='$ttsr_date', ttsr_time='$ttsr_time', ttsr_time='$ttsr_time', ttsr_remarks='$ttsr_remarks', invoice_subtotal='$invoice_subtotal', invoice_taxable='$invoice_taxable', invoice_rate='$invoice_rate', invoice_taxdue='$invoice_taxdue', invoice_other='$invoice_other', invoice_total='$invoice_total' WHERE invoice_id='$invoice_id'");

    echo "<script>alert('You successfully edit Invoice!')</script>";
    echo "<script>window.open('invoice-edit.php?id=$invoice_number','_self')</script>";
    ?>

<?php
}
?>