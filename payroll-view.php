<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['id'];
$result_salary = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_employee on tbl_salary.emp_no = tbl_employee.emp_no LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id WHERE tbl_salary.over_id = '$get_id'");
// $result_date = mysqli_query($mysqli, "SELECT * FROM tbl_date LEFT JOIN tbl_salary on tbl_date.payroll_sched = tbl_salary.payroll_sched WHERE tbl_salary.over_id = '$get_id'");
// $result_date_to = mysqli_query($mysqli, "SELECT * FROM tbl_date LEFT JOIN tbl_salary on tbl_date.payroll_sched = tbl_salary.payroll_sched WHERE tbl_salary.over_id = '$get_id'");
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
    <div class="nav-hide">
        <?php include 'nav.php'; ?>
    </div>


    <div class="button-print">
        <button onClick="window.print()"> <i class="fa fa-print" aria-hidden="true"></i> PRINT</button>
    </div>

    <section>
        <?php
            $i = 1;
            while ($payroll_row = mysqli_fetch_array($result_salary)) {$id = $payroll_row['emp_no'];
                $int_reim = $payroll_row['earn_incentives'] + $payroll_row['earn_reimburse'];
                $late_absnt = $payroll_row['deduc_late'] + $payroll_row['deduc_absent'] + $payroll_row['deduc_undertime'];
                $net_pay = $payroll_row['earn_total'] - $payroll_row['deduc_total'];  ?>
        <div class="container-area">
            <div class="payroll-view">
                <div class="logo">
                    <img src="image/fgsp_logo2.png" alt="">
                </div>
                <div class="employee-info">
                    <div class="info-area">
                        <div class="info-flex">
                            <div class="name">
                                Employee Name : <span><?php echo $payroll_row['emp_name']; ?> </span>
                            </div>
                            <div class="position">
                                Designation : <?php echo $payroll_row['emp_position']; ?>
                            </div>
                        </div>
                        <div class="info-flex">
                 
                            <div class="name">
                                Payroll Schedule : <?php echo $payroll_row['payroll_sched']; ?>
                            </div>
                            <div class="position">
                                Cut off : <?php echo $payroll_row['cutoff_sched']; ?>
                            </div>
                          
                        </div>
                    </div>

                </div>

                <div class="payroll-earn-cont">
                    <div class="desc">
                        BASIC PAY
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_salary']; ?>
                    </div>
                    <div class="desc">
                        INCENTIVES/REIMBURSEMENT
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $int_reim; ?>
                    </div>
                    <div class="desc">
                        ALLOWANCE
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_allowance']; ?>
                    </div>

                    <div class="desc">
                        OVERTIME
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_overtime']; ?>
                    </div>

                    <div class="desc">
                        GROSS PAY
                    </div>
                    <div class="desc-info">
                        &#8369; <span> <?php echo $payroll_row['earn_total']; ?> </span>
                    </div>
                </div>
                <div class="deduc-sec">
                    DEDUCTIONS
                </div>
                <div class="payroll-earn-cont">
                    <div class="desc">
                        LATE/ABSENT/UNDERTIME
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $late_absnt; ?>
                    </div>
                    <div class="desc">
                        SSS
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_sss']; ?>
                    </div>
                    <div class="desc">
                        PHIC
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_philhealth']; ?>
                    </div>

                    <div class="desc">
                        HDMF
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_pagibig']; ?>
                    </div>
                    <div class="desc">
                        W-TAX
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_tax']; ?>
                    </div>


                </div>
                <div class="net">
                    <div class="pay">
                        <div class="desc">
                            NETPAY
                        </div>
                        <div class="desc-info">
                            <span> &#8369; <?php echo $net_pay; ?> </span>
                        </div>
                    </div>
                </div>

                <div class="signature">
                    <div class="sig-cont">
                        <div class="official">
                            EMPLOYEE SIGNATURE
                        </div>
                        <div class="official">
                            NOTED BY: RANI REGALADO

                        </div>
                        <div class="official">
                            PREPARED BY: JACLYN KATE CARTASANO
                        </div>
                        <div class="official">
                            &nbsp;
                        </div>
                        <div class="official">
                            <span> TREASURER </span>
                        </div>
                        <div class="official">
                            <span>EXECUTIVE ASSISTANT </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-area">
            <div class="payroll-view">
                <div class="logo">
                    <img src="image/fgsp_logo2.png" alt="">
                </div>
                <div class="employee-info">
                    <div class="info-area">
                        <div class="info-flex">
                            <div class="name">
                                Employee Name : <span><?php echo $payroll_row['emp_name']; ?> </span>
                            </div>
                            <div class="position">
                                Designation : <?php echo $payroll_row['emp_position']; ?>
                            </div>
                        </div>
                        <div class="info-flex">
                       
                            <div class="name">
                                Payroll Schedule : <?php echo $payroll_row['payroll_sched']; ?>
                            </div>
                            <div class="position">
                                Cut off : <?php echo $payroll_row['cutoff_sched']; ?>
                            </div>
                          
                        </div>
                    </div>

                </div>

                <div class="payroll-earn-cont">
                    <div class="desc">
                        BASIC PAY
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_salary']; ?>
                    </div>
                    <div class="desc">
                        INCENTIVES/REIMBURSEMENT
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $int_reim; ?>
                    </div>
                    <div class="desc">
                        ALLOWANCE
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_allowance']; ?>
                    </div>

                    <div class="desc">
                        OVERTIME
                    </div>
                    <div class="desc-info">
                        &#8369; <?php echo $payroll_row['earn_overtime']; ?>
                    </div>

                    <div class="desc">
                        GROSS PAY
                    </div>
                    <div class="desc-info">
                        &#8369; <span> <?php echo $payroll_row['earn_total']; ?> </span>
                    </div>
                </div>
                <div class="deduc-sec">
                    DEDUCTIONS
                </div>
                <div class="payroll-earn-cont">
                    <div class="desc">
                        LATE/ABSENT/UNDERTIME
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $late_absnt; ?>
                    </div>
                    <div class="desc">
                        SSS
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_sss']; ?>
                    </div>
                    <div class="desc">
                        PHIC
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_philhealth']; ?>
                    </div>

                    <div class="desc">
                        HDMF
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_pagibig']; ?>
                    </div>
                    <div class="desc">
                        W-TAX
                    </div>
                    <div class="desc-info">
                        - &#8369; <?php echo $payroll_row['deduc_tax']; ?>
                    </div>


                </div>
                <div class="net">
                    <div class="pay">
                        <div class="desc">
                            NETPAY
                        </div>
                        <div class="desc-info">
                            <span> &#8369; <?php echo $net_pay; ?> </span>
                        </div>
                    </div>
                </div>

                <div class="signature">
                    <div class="sig-cont">
                        <div class="official">
                            EMPLOYEE SIGNATURE
                        </div>
                        <div class="official">
                            NOTED BY: RANI REGALADO

                        </div>
                        <div class="official">
                            PREPARED BY: JACLYN KATE CARTASANO
                        </div>
                        <div class="official">
                            &nbsp;
                        </div>
                        <div class="official">
                            <span> TREASURER </span>
                        </div>
                        <div class="official">
                            <span>EXECUTIVE ASSISTANT </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php } ?>
    </section>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>



</body>

</html>