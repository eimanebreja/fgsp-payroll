<form method="POST" id="save" action="save.php">
                            <div class="form-label">
                                Payroll Schedule :
                            </div>
                            <div class="form-input">
                                <input type="text" name="payroll_sched" placeholder="Enter payroll schedule..." />
                            </div>
                            <div class="form-label pad">
                                Cut-Off Date :
                            </div>
                            <div class="form-input">
                                <input type="text" name="cutoff" placeholder="Enter cut off dates..." />
                            </div>
                            <hr>
                            <label class="container top">SELECT ALL EMPLOYEE
                                <input onclick="checkAll(this)" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <?php  
                                while ($emp_salary_row = mysqli_fetch_array($add_emp_salary)) {
                                    $id = $emp_salary_row['emp_id']; 
                                    ?>
                            <label class="container"> <?php echo $emp_salary_row['emp_name']; ?>
                                <input type="checkbox" name="subject[]"
                                    value="<?php echo $emp_salary_row['emp_no']; ?>">
                                <span class="checkmark"></span>
                            </label>
                            <?php } ?>

                            <div class="form-button">
                                <button id="submit" class="btn-add" name="add">SUBMIT</button>
                            </div>
                        </form>












                        <?php include 'session.php';?>
<?php

include_once "dbcon.php";
$add_emp_salary = mysqli_query($mysqli, "SELECT * FROM tbl_employee");
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
                        <div class="menu-title">Payroll</div>
                        <div class="menu-icon">
                            <span><a data-target="list-employee" href="list-employee.php"><i class="fa fa-list"
                                        aria-hidden="true"></i></a></span>
                            <span><a data-target="add-employee" href="add-payroll.php"><i class="fa fa-plus-circle"
                                        aria-hidden="true"></i></a></span>
                        </div>
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
                <div class="payroll-add">
                    <div class="add-emp head">
                        Add Payroll
                    </div>
                    <div class="note">
                        <span> Note : </span> If the employee are not exist in the list. Go to <a
                            href="add-employee.php"> here </a> to add a new employee.
                    </div>
                    <div class="employ-list">
                        <form method="POST" id="save" action="save.php">
                            <div class="form-label">
                                Payroll Schedule :
                            </div>
                            <div class="form-input">
                                <input type="text" name="payroll_sched" placeholder="Enter payroll schedule..." />
                            </div>
                            <div class="form-label pad">
                                Cut-Off Date :
                            </div>
                            <div class="form-input">
                                <input type="text" name="cutoff" placeholder="Enter cut off dates..." />
                            </div>
                            <hr>
                            <label class="container top">SELECT ALL EMPLOYEE
                                <input onclick="checkAll(this)" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <?php  
                                while ($emp_salary_row = mysqli_fetch_array($add_emp_salary)) {
                                    $id = $emp_salary_row['emp_id']; 
                                    ?>
                            <label class="container"> <?php echo $emp_salary_row['emp_name']; ?>
                                <input type="checkbox" name="subject[]"
                                    value="<?php echo $emp_salary_row['emp_no']; ?>">
                                <span class="checkmark"></span>
                            </label>
                            <?php } ?>

                            <div class="form-button">
                                <button id="submit" class="btn-add" name="add">SUBMIT</button>
                            </div>
                        </form>
                    </div>
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

    <script>
    function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
    </script>

    <script>
    $(document).ready(function() {

        $('#submit').click(function() {
            $.ajax({
                async: true,
                url: "save.php",
                method: "POST",
                data: $('#save').serialize(),
                success: function(rt) {
                    alert(rt);
                    $('#save')[0].reset();
                }
            });
        });

    });
    </script>

</body>

</html>


employee-earnings
employee-deduction

9:20
10:16
10:36
