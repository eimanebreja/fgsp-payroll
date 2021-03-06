<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$result_date = mysqli_query($mysqli, "SELECT * FROM tbl_date");
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
                        Menu
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">Employee List</div>
                        <div class="menu-icon">
                            <span><a data-target="list-employee" href="list-employee.php"><i class="fa fa-list"
                                        aria-hidden="true"></i></a></span>
                            <span><a data-target="add-employee" href="add-employee.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="menu-area">
                        <div class="menu-title">Employee Earnings</div>
                        <div class="menu-icon">
                            <span><a data-target="employee-earning" href="employee-earning.php"><i class="fa fa-list"
                                        aria-hidden="true"></i></a></span>
                            <span><a data-target="add-employee-earning" href="add-employee-earning.php"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></a></span>
                        </div>
                    </div>

                    <div class="menu-area">
                        <div class="menu-title">Employee Deduction</div>
                        <div class="menu-icon">
                            <span><a data-target="employee-deduction" href="employee-deduction.php"><i
                                        class="fa fa-list" aria-hidden="true"></i></a></span>
                            <span><a data-target="add-employee-deduction" href="add-employee-deduction.php"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></a></span>
                        </div>
                    </div>

                    <div class="menu-area">
                        <div class="menu-title">Payroll</div>
                        <div class="menu-icon">
                            <span><a data-target="payroll" href="payroll.php"><i class="fa fa-external-link"
                                        aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="area-content">
                <div class="add-emp">
                    Payroll Settings
                </div>
                <div class="add-employee-form">
                    <form method="POST" action="edit-settings-query.php">
                        <?php
                            $i = 1;
                            while ($date_row = mysqli_fetch_array($result_date)) {
                                $id = $date_row['date_id'];

                                ?>
                        <div class="form-label">
                            Payroll Schedule :
                        </div>
                        <div class="form-input">
                            <input type="hidden" value="<?php echo $date_row['date_id']; ?>" name="date_id"
                                placeholder="Enter payroll schedule..." />
                            <input type="text" value="<?php echo $date_row['payroll_sched']; ?>" name="payroll_sched"
                                placeholder="Enter payroll schedule..." />
                        </div>
                        <div class="form-label pad">
                            Cut-Off Date :
                        </div>
                        <div class="form-input">
                            <input type="text" name="cutoff" value="<?php echo $date_row['cutoff_sched']; ?>"
                                placeholder="Enter lastname..." />
                        </div>

                        <div class="form-button">
                            <button class="btn-add" name="edit_payroll">SUBMIT</button>
                        </div>
                        <?php } ?>
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

                <div class="up-events">
                    <div class="events-title">
                        Upcoming Events <?php  echo date("d"); ?>
                    </div>
                    <div class="events-body">

                        <div class="date">
                            October 31, 2019
                        </div>
                        <div class="desc">
                            - Hollowen Party
                        </div>

                        <div class="date">
                            October 31, 2019
                        </div>
                        <div class="desc">
                            - Hollowen Party
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>


</body>

</html>