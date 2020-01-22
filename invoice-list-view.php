<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$get_id = $_GET['id'];
$result_invoice = mysqli_query($mysqli, "SELECT * FROM tbl_invoice WHERE invoice_number= '$get_id'");
$result_convert = mysqli_query($mysqli, "SELECT * FROM tbl_convert WHERE invoice_number= '$get_id'");


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
</head>

<body id="dashboard">
    <?php  
        while ($invoice_row = mysqli_fetch_array($result_invoice)) {         
    ?>
    <section>
        <div class="invoice-view">
            <button class="invoice-btn" onclick="myFunction()"><i class="fa fa-print" aria-hidden="true"></i>
                PRINT</button>
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
                        <p><span>DATE</span><?php echo $invoice_row['invoice_date']; ?></p>
                        <p><span>INVOICE #</span><?php echo $invoice_row['invoice_number']; ?></p>
                        <p><span>DUE DATE</span><?php echo $invoice_row['invoice_duedate']; ?></p>
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
                                <p><span>Company Name : </span><span><?php echo $invoice_row['company_name']; ?></span>
                                </p>
                            </div>
                            <div class="invoice-body-info">
                                <p><span>Address : </span><span><?php echo $invoice_row['company_address']; ?></span>
                                </p>
                            </div>
                            <div class="invoice-body-info">
                                <p><span>Contact Number :
                                    </span><span><?php echo $invoice_row['company_contact']; ?></span></p>
                            </div>
                            <div class="invoice-body-info">
                                <p><span>Attention to : </span><span><?php echo $invoice_row['attention_to']; ?></span>
                                </p>
                            </div>
                            <div class="invoice-body-info">
                                <p><span>Position :
                                    </span><span><?php echo $invoice_row['attention_position']; ?></span>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
                <table class="invoice-table-bottom">
                    <tr>
                        <th>DATE</th>
                        <th>DESCRIPTION</th>
                        <th>YEN CONVERSION</th>
                        <th>PESO CONVERSION</th>
                    </tr>
                    <?php  
                            while ($convert_row = mysqli_fetch_array($result_convert)) {         
                                ?>
                    <tr>
                        <td class="td-print"><?php echo $convert_row['convert_date']; ?> </td>
                        <td class="td-print"><?php echo $convert_row['convert_description']; ?></td>
                        <td class="td-print"><?php echo $convert_row['convert_yen']; ?></td>
                        <td class="td-print"> <?php echo $convert_row['convert_peso']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="invoice-area">
                <div class="invoice-company">
                    <div class="remarks">
                        <p>Telegraphic Transfer Selling Rate (TTSR) : <?php echo $invoice_row['ttsr_number']; ?></p>
                        <p>Date : <?php echo $invoice_row['ttsr_date']; ?></p>
                        <p>Time : <?php echo $invoice_row['ttsr_time']; ?></p>
                        <div class="remarks-area">
                            REMARKS
                        </div>
                        <div class="remarks-textarea">
                            <span><?php echo $invoice_row['ttsr_remarks']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="invoice-information">
                    <p class="total"> <span>Subtotal</span><span
                            class="information-input"><?php echo $invoice_row['invoice_subtotal']; ?></span> </p>
                    <p class="total"> <span>Taxable</span><span
                            class="information-input"><?php echo $invoice_row['invoice_taxable']; ?></span> </p>
                    <p class="total"> <span>Tax Rate</span><span
                            class="information-input"><?php echo $invoice_row['invoice_rate']; ?></span> </p>
                    <p class="total"> <span>Tax Due </span><span
                            class="information-input"><?php echo $invoice_row['invoice_taxdue']; ?></span> </p>
                    <p class="total"> <span>Other's</span> <span
                            class="information-input"><?php echo $invoice_row['invoice_other']; ?></span></p>
                    <hr>
                    <p class="totals">TOTAL <span>₱ </span><span
                            class="total-amount"><?php echo $invoice_row['invoice_total']; ?></span></p>
                </div>
            </div>

            <div class="invoice-question">
                <p class="ques">If you have any questions about this invoice, please contact</p>
                <p class="ceo">Chieto Amano</p>
                <p class="email">amano@fgsp.ph</p>
                <p class="thankyou">Thank You For Your Business!</p>
            </div>
        </div>
    </section>
    <?php } ?>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>

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
    function myFunction() {
        window.print();
    }
    </script>

</body>

</html>