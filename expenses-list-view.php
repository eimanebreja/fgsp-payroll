<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$get_id = $_GET['months'];
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_months = mysqli_query($mysqli, "SELECT DISTINCT(expenses_month) FROM tbl_expenses WHERE expenses_month = '$get_id'");
$result_months_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '2' AND expenses_month = '$get_id'");
$result_months_other_expenses = mysqli_query($mysqli, "SELECT * FROM tbl_expenses WHERE expenses_category = '3' AND expenses_month = '$get_id'");

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
            <div class="sidebar">
                <div class="sidebar-admin">
                    <div class="logo-area">
                        <div class="logo">
                            <img src="image/fgsp_logo.png" alt="">
                        </div>
                        <div class="name">
                            <div class="c_name"><a href="dashboard.php">Feemo Global Solutions Philippines</a></div>
                            <div>@<?php echo $user_row['user_name']; ?></div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <div class="sidebar-title">
                        EMPLOYEE
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">List/Add Employee</div>
                        <div class="menu-icon">
                            <span><a href="list-employee.php"><i class="fa fa-list" aria-hidden="true"></i></a></span>
                            <span><a href="add-employee.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="sidebar-title">
                        PAYROLL
                    </div>

                    <div class="menu-area">
                        <div class="menu-title">Add Payroll</div>
                        <div class="menu-icon">
                            <span><a href="add-payroll.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>

                    <div class="menu-area">
                        <div class="menu-title">Pending Payroll</div>
                        <div class="menu-icon">
                            <span><a href="payroll.php"><i class="fa fa-external-link"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">Approved Payroll</div>
                        <div class="menu-icon">
                            <span><a href="approved-payroll.php"><i class="fa fa-external-link"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">Payroll Transaction</div>
                        <div class="menu-icon">
                            <span><a href="payroll-transaction.php"><i class="fa fa-external-link"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="sidebar-title">
                        EXPENSES
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">List/Add Expenses</div>
                        <div class="menu-icon">
                            <span><a href="expenses-list.php"><i class="fa fa-list" aria-hidden="true"></i></a></span>
                            <span><a href="add-expenses.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="area-content">
                <?php         
                while ($mt_row = mysqli_fetch_array($result_months)) {
                  
                    ?>
                <div class="expense-title">
                    <?php echo $mt_row['expenses_month']; ?> Expenses

                </div>
                <?php } ?>

                <div class="expenses-mnthly-tbl">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>No.</th>
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
                            <td><?php echo $months_expenses['expenses_date']; ?></td>
                            <td><?php echo $months_expenses['expenses_name']; ?></td>
                            <td><?php echo $months_expenses['expenses_payable_to']; ?></td>
                            <td><?php echo $months_expenses['expenses_check_number']; ?></td>
                            <td><?php echo $months_expenses['check_payment_date']; ?></td>
                            <td><?php echo $months_expenses['expenses_amount']; ?></td>
                            <td><a id="<?php echo $id; ?>" href="expenses-delete.php<?php echo '?id=' . $id; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        <?php $i++;} ?>
                    </table>



                    <div class="other-expenses-text">
                        OTHER EXPENSES
                    </div>

                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>No.</th>
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
                while ($months_other_expenses = mysqli_fetch_array($result_months_other_expenses)) {
                    $id_other = $months_other_expenses['expenses_id']; 
                    ?>
                        <tr>
                            <td><?php echo "$i."; ?></td>
                            <td><?php echo $months_other_expenses['expenses_date']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_name']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_payable_to']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_quantity']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_check_number']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_tin_number']; ?></td>
                            <td><?php echo $months_other_expenses['expenses_amount']; ?></td>
                            <td><a id="<?php echo $id_other; ?>"
                                    href="expenses-other-delete.php<?php echo '?id=' . $id_other; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                        <?php $i++;} ?>
                    </table>

                </div>
            </div>


            <div class="area-event">
                <div class="calendar">
                    <?php
                    $monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
                    "August", "September", "October", "November", "December");
                    ?>
                    <?php
                    if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
                    if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
                    ?>
                    <?php
                    $cMonth = $_REQUEST["month"];
                    $cYear = $_REQUEST["year"];
                    
                    $prev_year = $cYear;
                    $next_year = $cYear;
                    $prev_month = $cMonth-1;
                    $next_month = $cMonth+1;
                    
                    if ($prev_month == 0 ) {
                        $prev_month = 12;
                        $prev_year = $cYear - 1;
                    }
                    if ($next_month == 13 ) {
                        $next_month = 1;
                        $next_year = $cYear + 1;
                    }
                    ?>
                    <table>
                        <tr>
                            <td>
                                <table>
                                    <tr style="display:flex">
                                        <td style="flex-basis:50%; text-align:left"> <a
                                                href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>">Previous</a>
                                        </td>
                                        <td style="flex-basis:50%; text-align:right"><a
                                                href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>">Next</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td colspan="7" style="text-align:center">
                                            <strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>S</strong></td>
                                        <td><strong>M</strong></td>
                                        <td><strong>T</strong></td>
                                        <td><strong>W</strong></td>
                                        <td><strong>T</strong></td>
                                        <td><strong>F</strong></td>
                                        <td><strong>S</strong></td>
                                    </tr>

                                    <?php 
                                    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
                                    $maxday = date("t",$timestamp);
                                    $thismonth = getdate ($timestamp);
                                    $startday = $thismonth['wday'];
                                    for ($i=0; $i<($maxday+$startday); $i++) {
                                        if(($i % 7) == 0 ) echo "<tr>";
                                        if($i < $startday) echo "<td></td>";
                                        else echo "<td>". ($i - $startday + 1) . "</td>";
                                        if(($i % 7) == 6 ) echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="event">
                    <div class="event-title">
                        EVENT <span><a href=""><i class="fa fa-plus" aria-hidden="true"></i></a></span>
                    </div>
                    <div class="event-body">
                        <ul>
                            <li>Chirstmas Party <span>(December 17, 2018)</span><a href=""><i class="fa fa-minus"
                                        aria-hidden="true"></i></a></li>
                            <li>Chirstmas Party <span>(December 17, 2018)</span><a href=""><i class="fa fa-minus"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

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