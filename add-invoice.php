<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_month_date = mysqli_query($mysqli, "SELECT DISTINCT(expenses_month) FROM tbl_expenses ORDER BY expenses_id DESC ");

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
$date = new DateTime("now", new DateTimeZone('Asia/Manila') );
echo $date->format('Y-m-d'); ?>"></span></p>
                                    <p><span>INVOICE #</span><span><input type="text" name="invoice_number"
                                                placeholder="Invoice Number" required></span>
                                    </p>
                                    <p><span>DUE DATE</span><span><input id="invoice_date" type="text"
                                                name="invoice_duedate" placeholder="Invoice Due Date"></span>
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
                                                        name="company_name" type="text"
                                                        placeholder="Company name..."></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Address :</span> <span class="bill-to-input"><input type="text"
                                                        name="company_address" placeholder="Company address..."></span>
                                            </p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Contact Number :</span> <span class="bill-to-input"><input
                                                        name="company_contact" type="text"
                                                        placeholder="Company contact..."></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Attention to :</span> <span class="bill-to-input"><input
                                                        name="attention_to" type="text"
                                                        placeholder="Attention to..."></span></p>
                                        </div>
                                        <div class="invoice-body-info">
                                            <p><span>Position :</span> <span class="bill-to-input"><input
                                                        name="attention_position" type="text"
                                                        placeholder="Position..."></span></p>
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
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="convert_date[]" placeholder="Date..."> </td>
                                    <td><input type="text" name="convert_description[]" placeholder="Description...">
                                    </td>
                                    <td><input type="text" name="convert_yen[]" placeholder="Yen conversation..."> </td>
                                    <td><input type="text" name="convert_peso[]" placeholder="Peso conversation...">
                                    </td>
                                    <td> <button class="add" name="add" id="add" type="button"><i
                                                class="fa fa-plus-circle" aria-hidden="true"></i></button></td>
                                </tr>
                            </table>
                        </div>

                        <div class="invoice-area">
                            <div class="invoice-company">
                                <div class="remarks">
                                    <p><span>Telegraphic Transfer Selling Rate (TTSR) :</span><span
                                            class="remarks-input"><input type="text" name="ttsr_number"></span></p>
                                    <p><span>Date :</span><span class="remarks-input"><input type="text"
                                                name="ttsr_date"></span>
                                    </p>
                                    <p><span>Time :</span><span class="remarks-input"><input type="text"
                                                name="ttsr_time"></span>
                                    </p>

                                    <div class="remarks-area">
                                        REMARKS
                                    </div>
                                    <div class="remarks-textarea">
                                        <textarea name="ttsr_remarks" id="" cols="30" rows="6"></textarea>
                                    </div>


                                </div>
                            </div>
                            <div class="invoice-information">
                                <p class="total"> <span>Subtotal</span><span class="information-input"><input
                                            name="invoice_subtotal" type="text"></span> </p>
                                <p class="total"> <span>Taxable</span><span class="information-input"><input
                                            name="invoice_taxable" type="text"></span> </p>
                                <p class="total"> <span>Tax Rate</span><span class="information-input"><input
                                            name="invoice_rate" type="text"></span> </p>
                                <p class="total"> <span>Tax Due </span><span class="information-input"><input
                                            name="invoice_taxdue" type="text"></span> </p>
                                <p class="total"> <span>Other's</span> <span class="information-input"><input
                                            name="invoice_other" type="text"></span></p>
                                <hr>
                                <p class="totals">TOTAL <span>₱ </span><span class="total-amount"><input
                                            name="invoice_total" type="text"></span></p>
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

    <!-- <script>
    $(document).ready(function() {
        // Set trigger and container variables
        var trigger = $('.menu-area .menu-icon span a'),
            container = $('.area-content');

        // Fire on click
        trigger.on('click', function() {
            // Set $this for re-use. Set target from data attribute
            var $this = $(this),
                target = $this.data('target');

            // Load target page into container
            container.load(target + '.php');

            // Stop normal link behavior
            return false;
        });
    });
    </script> -->

    <script>
    $(function() {
        $('input[id$=invoice_date]').datepicker({
            dateFormat: 'yy-mm-o'
        });
    });
    </script>


    <script>
    $(document).ready(function() {

        $(document).on('click', '#add', function() {
            var html = '';
            html += ' <tr class="remove-content">';
            html += ' <td><input type="text" name="date[]" placeholder="Date..."> </td>';
            html += '  <td><input type="text" name="description[]" placeholder="Description..."> </td>';
            html += '  <td><input type="text" name="yen[]" placeholder="Yen conversation..."> </td>';
            html += '  <td><input type="text" name="peso[]" placeholder="Peso conversation..."> </td>';
            html +=
                '   <td> <button class="remove" name="remove" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></td>';
            html += ' <input placeholder="Enter price" name="price[]" type="text" required>';
            html += '  </tr>';
            $('#dynamic_field').append(html);
        });
        $(document).on('click', '.remove', function() {
            $(this).closest('.remove-content').remove();
        });


    });
    </script>
    <script>
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
    </script>

</body>

</html>