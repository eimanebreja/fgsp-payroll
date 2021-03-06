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
                    <div class="menu-area">
                        <div class="menu-title">Add Employee Earnings</div>
                        <div class="menu-icon">
                            <span><a href="add-employee-earning.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>

                    <div class="menu-area">
                        <div class="menu-title">Add Employee Deduction</div>
                        <div class="menu-icon">

                            <span><a href="add-employee-deduction.php"><i class="fa fa-plus-circle"
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
                </div>
            </div>
            <div class="area-content">
                <div class="add-emp">
                    Add Employee Earning
                </div>
                <div class="add-employee-form">
                    <form method="POST" action="add-earnings-query.php">
                        <div class="form-label pad">
                            Employee :
                        </div>
                        <div class="form-input">
                            <?php
                $result_employee = mysqli_query($mysqli, "SELECT * FROM tbl_employee");
            ?>
                            <select name="emp_no">
                                <option value="" disabled selected>SELECT EMPLOYEE</option>
                                <?php
                    while ($emp_row = mysqli_fetch_array($result_employee)) {?> <option
                                    value="<?php echo $emp_row['emp_no']; ?>"><?php echo $emp_row['emp_name']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-label pad">
                            Basic Salary :
                        </div>
                        <div class="form-input">
                            <input type="text" name="salary" placeholder="Enter basic salary..." />
                        </div>
                        <div class="form-label pad">
                            Allowance :
                        </div>
                        <div class="form-input">
                            <input type="text" name="allowance" placeholder="Enter allowance..." />
                        </div>
                        <div class="form-label pad">
                            Overtime :
                        </div>
                        <div class="form-input">
                            <input type="text" name="overtime" placeholder="Enter overtime..." />
                        </div>

                        <div class="form-label pad">
                            Incentives :
                        </div>
                        <div class="form-input">
                            <input type="text" name="incentives" placeholder="Enter incentives..." />
                        </div>

                        <div class="form-label pad">
                            Reimbursement :
                        </div>
                        <div class="form-input">
                            <input type="text" name="reimburse" placeholder="Enter reimbursement..." />
                        </div>

                        <div class="form-button">
                            <button class="btn-add" name="add_earn">SUBMIT</button>
                        </div>
                    </form>

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

</body>

</html>