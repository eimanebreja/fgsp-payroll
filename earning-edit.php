<?php include 'session.php';?>
<?php

include_once "dbcon.php";

$get_id = $_GET['id'];
$result_emp_earn = mysqli_query($mysqli, "SELECT * FROM tbl_overview LEFT JOIN tbl_employee on tbl_overview.emp_no = tbl_employee.emp_no WHERE tbl_overview.over_id = '$get_id'");
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
                <div class="add-emp">
                    Update Employee Earning
                </div>
                <div class="add-employee-form">
                    <form method="POST" action="edit-earnings-query.php">
                        <?php
                            $i = 1;
                            while ($emp_earn_row = mysqli_fetch_array($result_emp_earn)) {
                                $over_id = $emp_earn_row['over_id'];
                                $emp_no = $emp_earn_row['emp_no'];

                                ?>
                        <div class="form-label pad">
                            Employee :
                        </div>
                        <div class="form-input">
                            <input name="over_id" type="hidden" class="validate"
                                value="<?php echo $emp_earn_row['over_id']; ?>">
                            <input type="text" disabled name="emp_name" value="<?php echo $emp_earn_row['emp_name']; ?>"
                                placeholder=" Enter employee..." />
                        </div>

                        <div class="form-label pad">
                            Basic Salary :
                        </div>
                        <div class="form-input">
                            <input type="text" name="salary" value="<?php echo $emp_earn_row['earn_salary']; ?>"
                                placeholder="Enter allowance..." />
                        </div>

                        <div class="form-label pad">
                            Allowance :
                        </div>
                        <div class="form-input">
                            <input type="text" name="allowance" value="<?php echo $emp_earn_row['earn_allowance']; ?>"
                                placeholder="Enter allowance..." />
                        </div>
                        <div class="form-label pad">
                            Overtime :
                        </div>
                        <div class="form-input">
                            <input type="text" name="overtime" value="<?php echo $emp_earn_row['earn_overtime']; ?>"
                                placeholder="Enter overtime..." />
                        </div>

                        <div class="form-label pad">
                            Incentives :
                        </div>
                        <div class="form-input">
                            <input type="text" name="incentives" value="<?php echo $emp_earn_row['earn_incentives']; ?>"
                                placeholder="Enter incentives..." />
                        </div>
                        <div class="form-label pad">
                            Reimbursement :
                        </div>
                        <div class="form-input">
                            <input type="text" name="reimburse" value="<?php echo $emp_earn_row['earn_reimburse']; ?>"
                                placeholder="Enter reimbursement..." />
                        </div>
                        <div class="form-label pad">
                            Other :
                        </div>
                        <div class="form-input">
                            <input type="text" name="other" value="<?php echo $emp_earn_row['earn_other']; ?>"
                                placeholder="Enter other earnings..." />
                        </div>

                        <div class="form-button">
                            <button class="btn-add" name="edit_earn">SUBMIT</button>
                        </div>
                        <?php } ?>
                    </form>

                </div>
            </div>

            <?php include('right-sidenav.php') ?>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>


</body>

</html>