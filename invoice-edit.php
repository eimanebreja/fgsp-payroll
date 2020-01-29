<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);

$get_id = $_GET['id'];

$result_invoice = mysqli_query($mysqli, "SELECT * FROM tbl_invoice where invoice_number='$get_id'");
while ($invoice_row = mysqli_fetch_array($result_invoice)) {
    $invoice_id = $invoice_row['invoice_id'];
    $id = $invoice_row['invoice_number'];
    $invoice_date = $invoice_row['invoice_date'];
    $invoice_duedate = $invoice_row['invoice_duedate'];
    $company_name = $invoice_row['company_name'];
    $company_address = $invoice_row['company_address'];
    $company_contact = $invoice_row['company_contact'];
    $attention_to = $invoice_row['attention_to'];
    $attention_position = $invoice_row['attention_position'];
    $ttsr_number = $invoice_row['ttsr_number'];
    $ttsr_date = $invoice_row['ttsr_date'];
    $ttsr_time = $invoice_row['ttsr_time'];
    $ttsr_remarks = $invoice_row['ttsr_remarks'];
    $invoice_subtotal = $invoice_row['invoice_subtotal'];
    $invoice_taxable = $invoice_row['invoice_taxable'];
    $invoice_rate = $invoice_row['invoice_rate'];
    $invoice_taxdue = $invoice_row['invoice_taxdue'];
    $invoice_other = $invoice_row['invoice_other'];
    $invoice_total = $invoice_row['invoice_total'];
}
$result_convert = mysqli_query($mysqli, "SELECT * FROM tbl_convert where invoice_number='$get_id'");

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
                    Add New Invoice
                </div>
                <form id="invoice-form">
                    <div class="invoice-view">
                        <button class="invoice-btn" type="submit" id="submits" name="invoice_send"><i class="fa fa-send"
                                aria-hidden="true"></i>
                            SAVE</button>
                        <div class="invoice-area">
                            <div class="invoice-company">
                                <div class="comlogo">
                                    <img src="image/invoice_logo.png" alt="">
                                </div>
                                <div class="cominfo">
                                    <p>Unit 207 Cityland 10 Tower II H.V Dela Costa Street <br>
                                        cor. Valero Street, Salcedo Village Brgy. Bel-Air<br>
                                        Makati City, Philippines</p>
                                </div>
                                <div class="comlink">
                                    <p>(02) 757 3937 <span>-</span> https://fgsp.ph </p>
                                </div>
                            </div>
                            <div class="invoice-information">
                                <div class="invoice-text">
                                    <h1>INVOICE</h1>
                                </div>
                                <div class="info-desc">
                                    <p><span>DATE</span><span><input type="text" name="invoice_date"
                                                placeholder="Invoice Date" value="<?php
echo $invoice_date; ?>"></span></p>
                                    <p><span>INVOICE #</span><span><input type="text" name="invoice_number"
                                                placeholder="Invoice Number" value="<?php echo $id; ?>"></span>
                                    </p>
                                    <p><span>DUE DATE</span><span><input id="invoice_date" type="text"
                                                name="invoice_duedate" placeholder="Invoice Due Date" value="<?php
echo $invoice_duedate; ?>"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-body">
                            <table class="invoice-table">
                                <tr>
                                    <th>BILL TO</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="invoice-body-info">
                                            <p><span>Company Name :</span> <span class="bill-to-input"><input
                                                        name="company_name" type="text" placeholder="Company name..."
                                                        value="<?php
echo $company_name; ?>"></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Address :</span> <span class="bill-to-input"><input type="text"
                                                        name="company_address" placeholder="Company address..." value="<?php
echo $company_address; ?>"></span>
                                            </p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Contact Number :</span> <span class="bill-to-input"><input
                                                        name="company_contact" type="text"
                                                        placeholder="Company contact..." value="<?php
echo $company_contact; ?>"></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Attention to :</span> <span class="bill-to-input"><input
                                                        name="attention_to" type="text" placeholder="Attention to..."
                                                        value="<?php
echo $attention_to; ?>"></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Position :</span> <span class="bill-to-input"><input
                                                        name="attention_position" type="text" placeholder="Position..."
                                                        value="<?php
echo $attention_position; ?>"></span></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="invoice-table-bottom" id="dynamic_field">
                                <tr>
                                    <th>DATE</th>
                                    <th>DESCRIPTION</th>
                                    <th>YEN CONVERSION</th>
                                    <th>PESO CONVERSION</th>

                                </tr>
                                <?php 
                                    while ($convert_row = mysqli_fetch_array($result_convert)) {
                                        $convert_id = $convert_row['convert_id'];
                                        $convert_date = $convert_row['convert_date'];
                                        $convert_description = $convert_row['convert_description'];
                                        $convert_yen = $convert_row['convert_yen'];
                                        $convert_peso = $convert_row['convert_peso'];
                                        ?>
                                <tr>
                                    <td>
                                        <input type="text" class="date-converts" name="convert_date[]"
                                            placeholder="Date..." value="<?php echo $convert_date; ?>"> </td>
                                    <td><input type="text" name="convert_description[]" placeholder="Description..."
                                            value="<?php echo $convert_description; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="convert_yen[]" placeholder="Yen conversation..."
                                            value="<?php echo $convert_yen; ?>"> </td>
                                    <td>
                                        <input type="text" name="convert_peso[]" placeholder="Peso conversation..."
                                            value="<?php echo $convert_peso; ?>">
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>

                        <div class="invoice-area">
                            <div class="invoice-company">
                                <div class="remarks">
                                    <p><span>Telegraphic Transfer Selling Rate (TTSR) :</span><span
                                            class="remarks-input"><input type="text" name="ttsr_number" value="<?php
echo $ttsr_number; ?>"></span></p>
                                    <p><span>Date :</span><span class="remarks-input"><input type="text"
                                                name="ttsr_date" value="<?php
echo $ttsr_date; ?>"></span>
                                    </p>
                                    <p><span>Time :</span><span class="remarks-input"><input type="text"
                                                name="ttsr_time" value="<?php
echo $ttsr_time; ?>"></span>
                                    </p>

                                    <div class="remarks-area">
                                        REMARKS
                                    </div>
                                    <div class="remarks-textarea">
                                        <textarea name="ttsr_remarks" id="" cols="30" rows="10"><?php
echo $ttsr_remarks; ?></textarea>
                                    </div>


                                </div>
                            </div>
                            <div class="invoice-information">
                                <p class="total"> <span>Subtotal</span><span class="information-input"><input
                                            name="invoice_subtotal" type="text" value="<?php
echo $invoice_subtotal; ?>"></span> </p>
                                <p class="total"> <span>Taxable</span><span class="information-input"><input
                                            name="invoice_taxable" type="text" value="<?php
echo $invoice_taxable; ?>"></span> </p>
                                <p class="total"> <span>Tax Rate</span><span class="information-input"><input
                                            name="invoice_rate" type="text" value="<?php
echo $invoice_rate; ?>"></span> </p>
                                <p class="total"> <span>Tax Due </span><span class="information-input"><input
                                            name="invoice_taxdue" type="text" value="<?php
echo $invoice_taxdue; ?>"></span> </p>
                                <p class="total"> <span>Other's</span> <span class="information-input"><input
                                            name="invoice_other" type="text" value="<?php
echo $invoice_other; ?>"></span></p>
                                <hr>
                                <p class="totals">TOTAL <span>₱ </span><span class="total-amount"><input
                                            name="invoice_total" type="text" value="<?php
echo $invoice_total; ?>"></span></p>
                            </div>
                        </div>

                        <div class="invoice-question">
                            <p class="ques">If you have any questions about this invoice, please contact</p>
                            <p class="ceo">Chieto Amano</p>
                            <p class="email">amano@fgsp.ph</p>
                            <p class="thankyou">Thank You For Your Business!</p>
                        </div>
                    </div>

                </form>

            </div>
            <?php include('right-sidenav.php') ?>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
    $(function() {
        $('input[id$=invoice_date]').datepicker({
            dateFormat: 'yy-mm-o'
        });

        $(".date-converts").datepicker({
            dateFormat: 'yy-mm-o'
        });


    });
    </script>


    <script>
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            var html = '';
            html += ' <tr class="remove-content">';
            html +=
                ' <td><input type="text" id="convert_date" class="date-converts" name="convert_date[]" placeholder="Date..."> </td>';
            html +=
                '  <td><input type="text" name="convert_description[]" placeholder="Description..."> </td>';
            html +=
                '  <td><input type="text" name="convert_yen[]" placeholder="Yen conversation..."> </td>';
            html +=
                '  <td><input type="text" name="convert_peso[]" placeholder="Peso conversation..."> </td>';
            html +=
                '   <td> <button class="remove" name="remove" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></td>';
            html += '  </tr>';


            $('#dynamic_field').append(html);
        });
        $(document).on('click', '.remove', function() {
            $(this).closest('.remove-content').remove();
        });

        $('#submits').click(function() {

            $.ajax({
                async: true,
                url: "add-invoice-query.php",
                method: "POST",
                data: $('#invoice-form').serialize(),
                success: function(rt) {
                    alert(rt);
                    $('#invoice-form')[0].reset();
                }
            });
        });

        init();
    });
    </script>


</body>

</html>