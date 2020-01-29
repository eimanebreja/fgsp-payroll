<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);


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

    <?php include 'nav.php'; ?>

    <section>
        <div class="container-area">
            <?php include('left-sidenav.php') ?>
            <div class="area-content">
                <div class="expense-title">
                    Invoice List
                </div>
                <div class="invoice-body-area">
                    <?php
                    $result_invoice = mysqli_query($mysqli, "SELECT * FROM tbl_invoice");
                    while ($invoice_row = mysqli_fetch_array($result_invoice)) {$id = $invoice_row['invoice_number'];
                     ?>
                    <div class="invoice-name">
                        <a id="<?php echo $id; ?>" href="invoice-edit.php<?php echo '?id=' . $id; ?>"> <span><i
                                    class="fa fa-credit-card" aria-hidden="true"></i></span>
                            <?php echo $invoice_row['invoice_number']; ?> </a>
                    </div>
                    <div class="invoice-action">
                        <span><a id="<?php echo $id; ?>" href="invoice-delete.php<?php echo '?id=' . $id; ?>"
                                class="delete" onclick="return confirm('Are you sure you want to delete?');"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </span><span><a id="<?php echo $id; ?>" href="invoice-list-view.php<?php echo '?id=' . $id; ?>"
                                class="report"><i class="fa fa-list-alt" aria-hidden="true"></i></a></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php include('right-sidenav.php') ?>
        </div>
    </section>





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

</body>

</html>