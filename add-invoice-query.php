<?php
include 'dbcon.php';
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


for ($i = 0; $i < count($_POST['convert_date']); $i++) {
$convert_date = mysqli_real_escape_string($mysqli, $_POST['convert_date'][$i]);
$convert_description = mysqli_real_escape_string($mysqli, $_POST['convert_description'][$i]);
$convert_yen = mysqli_real_escape_string($mysqli, $_POST['convert_yen'][$i]);
$convert_peso = mysqli_real_escape_string($mysqli, $_POST['convert_peso'][$i]);

    if (empty(trim($convert_date))) {
        continue;
    }

$result_items = "INSERT INTO tbl_convert (convert_date, convert_description, convert_yen, convert_peso, invoice_number)
VALUES('$convert_date', '$convert_description', '$convert_yen', '$convert_peso', '$invoice_number')";
mysqli_query($mysqli, $result_items);

}

$result_invoice = "INSERT INTO tbl_invoice (invoice_date, invoice_number, invoice_duedate, company_name, company_address, company_contact, attention_to, attention_position, ttsr_number, ttsr_date, ttsr_time, ttsr_remarks, invoice_subtotal, invoice_taxable, invoice_rate, invoice_taxdue, invoice_other, invoice_total)
VALUES('$invoice_date', '$invoice_number', '$invoice_duedate', '$company_name', '$company_address', '$company_contact', '$attention_to', '$attention_position', '$ttsr_number','$ttsr_date','$ttsr_time','$ttsr_remarks','$invoice_subtotal','$invoice_taxable','$invoice_rate','$invoice_taxdue','$invoice_other','$invoice_total')";
mysqli_query($mysqli, $result_invoice);

if (mysqli_error($mysqli)) {
    echo "Data base error occured";
} else {
    echo $i . " rows added, Successful";
   
}


?>