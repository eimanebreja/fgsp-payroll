<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$get_id = $_GET['months'];
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_months = mysqli_query($mysqli, "SELECT DISTINCT(expenses_month) FROM tbl_expenses WHERE expenses_month = '$get_id'");
$result_months_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '2' AND expenses_month = '$get_id' ORDER BY expenses_date ASC");
$result_months_other_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '3' AND expenses_month = '$get_id' ORDER BY expenses_date ASC");
$result_months_check_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '4' AND expenses_month = '$get_id' ORDER BY expenses_date ASC");

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
            <?php include('left-sidenav.php');?>
            <div class="area-content">
                <?php         
                while ($mt_row = mysqli_fetch_array($result_months)) {         
                    ?>
                <div class="expense-title">
                    <?php echo $mt_row['expenses_month']; ?> Expenses

                </div>
                <?php } ?>

                <div class="expenses-mnthly-tbl">
                    <table cellspacing="0" cellpadding="0" class="check-expenses-table">
                        <tr>
                            <th>#</th>
                            <th>REF NO</th>
                            <th>DUE DATE</th>
                            <th>EXPENSES</th>
                            <th>PAYABLE TO</th>
                            <th>CHECK NUMBER</th>
                            <th>PAYABLE DATE</th>
                            <th>AMOUNT</th>
                            <th>ACTION</th>
                        </tr>
                        <?php  
                          $i=1;       
                while ($months_expenses = mysqli_fetch_array($result_months_expenses)) {
                    $id = $months_expenses['expenses_id']; 
                    ?>
                        <tr>
                            <td><?php echo "$i."; ?></td>
                            <td><?php echo $months_expenses['expenses_reference']; ?></td>
                            <td><?php echo $months_expenses['expenses_date']; ?></td>
                            <td><?php echo $months_expenses['expenses_name']; ?></td>
                            <td><?php echo $months_expenses['expenses_payable_to']; ?></td>
                            <td><?php echo $months_expenses['expenses_check_number']; ?></td>
                            <td><?php echo $months_expenses['check_payment_date']; ?></td>
                            <td><?php echo $months_expenses['expenses_amount']; ?></td>
                            <td><a id="<?php echo $id; ?>" href="expenses-delete.php<?php echo '?id=' . $id; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                <a id="<?php echo $id; ?>" href="expenses-edit.php<?php echo '?id=' . $id; ?>"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $i++;} ?>
                    </table>

                    <div class="other-expenses-text">
                        CASH EXPENSES
                    </div>

                    <table cellspacing="0" cellpadding="0" class="check-expenses-table">
                        <tr>
                            <th>#</th>
                            <th>REF NO</th>
                            <th>DATE</th>
                            <th>PURPOSE</th>
                            <th>PAYABLE TO</th>
                            <th>QUANTITY</th>
                            <th>TIN NUMBER</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                        <?php  
                          $i=1;       
                while ($months_other_expenses = mysqli_fetch_array($result_months_other_expenses)) {
                    $id_other = $months_other_expenses['expenses_id']; 
                    $refer = $months_other_expenses['expenses_reference']; 
                    ?>
                        <tr>
                            <td><?php echo "$i."; ?></td>
                            <td><?php echo $months_other_expenses['expenses_reference']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_date']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_name']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_payable_to']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_quantity']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_tin_number']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_amount']; ?></td>
                            <td><a id="<?php echo $refer; ?>"
                                    href="expenses-other-item-delete.php<?php echo '?id=' . $refer; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                <a id="<?php echo $id_other; ?>"
                                    href="expenses-cash-edit.php<?php echo '?id=' . $id_other; ?>"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $i++;} ?>
                    </table>
                    <div class="other-expenses-text">
                        CHECK EXPENSES
                    </div>

                    <table cellspacing="0" cellpadding="0" class="check-expenses-table">
                        <tr>
                            <th>#</th>
                            <th>REF NO</th>
                            <th>DATE</th>
                            <th>PURPOSE</th>
                            <th>PAYABLE TO</th>
                            <th>QUANTITY</th>
                            <th>CHECK NUMBER</th>
                            <th>TIN NUMBER</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                        <?php  
                          $i=1;       
                while ($months_check_expenses = mysqli_fetch_array($result_months_check_expenses)) {
                    $id_check = $months_check_expenses['expenses_id']; 
                    ?>
                        <tr>
                            <td><?php echo "$i."; ?></td>
                            <td><?php echo $months_check_expenses['expenses_reference']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_date']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_name']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_payable_to']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_quantity']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_check_number']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_tin_number']; ?></td>
                            <td><?php echo $months_check_expenses['expenses_amount']; ?></td>
                            <td><a id="<?php echo $id_check; ?>"
                                    href="expenses-other-delete.php<?php echo '?id=' . $id_check; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                <a id="<?php echo $id_other; ?>"
                                    href="expenses-check-edit.php<?php echo '?id=' . $id_check; ?>"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $i++;} ?>
                    </table>

                </div>
            </div>
            <?php include('right-sidenav.php');?>

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

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
        console.log("Tap");
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</body>

</html>