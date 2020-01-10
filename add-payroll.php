<?php include 'session.php';?>
<?php

include_once "dbcon.php";
$overview_salary = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_overview on tbl_salary.over_id = tbl_overview.over_id");
$earning_salary = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_earnings on tbl_salary.earn_total = tbl_earnings.earn_total");
$deduction_salary = mysqli_query($mysqli, "SELECT * FROM tbl_salary LEFT JOIN tbl_deduction on tbl_salary.deduc_total = tbl_deduction.deduc_total");
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body id="dashboard">

    <?php include 'nav.php'; ?>

    <section>
        <div class="container-area">
            <?php include('left-sidenav.php') ?>
            <div class="area-content">
                <div class="payroll-add">
                    <div class="add-emp head">
                        Add Payroll
                    </div>
                    <div class="note">
                        <span> Note : </span> If the employee is not on the list, Go to <a href="add-employee.php"> here
                        </a> to add a new employee.
                    </div>
                    <div class="employ-list">
                        <form method="POST" id="login" action="save.php">
                            <div class="form-label">
                                Payroll Schedule :
                            </div>
                            <div class="form-input">
                                <input type="text" id="datepicker" name="payroll_scheds"
                                    placeholder="Enter payroll schedule..." />
                            </div>
                            <div class="form-label pad">
                                Cut-Off Date :
                            </div>
                            <div class="form-input">
                                <input type="text" name="cutoff" placeholder="Enter cut off date..." />
                            </div>
                            <?php  
                                while ($over_row = mysqli_fetch_array($overview_salary)) {
                                    $earn_total = $over_row['earn_total']; 
                                    $earn_salary = $over_row['earn_salary']; 
                                    $earn_allowance = $over_row['earn_allowance']; 
                                    $earn_overtime = $over_row['earn_overtime']; 
                                    $earn_incentives = $over_row['earn_incentives']; 
                                    $earn_reimburse = $over_row['earn_reimburse']; 
                                    $deduc_total = $over_row['deduc_total']; 
                                    $deduc_late = $over_row['deduc_late']; 
                                    $deduc_absent = $over_row['deduc_absent']; 
                                    $deduc_pagibig = $over_row['deduc_pagibig']; 
                                    $deduc_sss = $over_row['deduc_sss']; 
                                    $deduc_philhealth = $over_row['deduc_philhealth']; 
                                    $deduc_undertime = $over_row['deduc_undertime']; 
                                    $deduc_tax = $over_row['deduc_tax']; 
            
                                    ?>
                            <div class="form-input">
                                <input type="hidden" name="earn_total[]" value="<?php echo $earn_total; ?>"
                                    placeholder="Enter earn..." />
                                <input type="hidden" name="earn_salary[]" value="<?php echo $earn_salary; ?>"
                                    placeholder="Enter earn..." />
                                <input type="hidden" name="earn_allowance[]" value="<?php echo $earn_allowance; ?>"
                                    placeholder="Enter earn..." />
                                <input type="hidden" name="earn_overtime[]" value="<?php echo $earn_overtime; ?>"
                                    placeholder="Enter earn..." />
                                <input type="hidden" name="earn_incentives[]" value="<?php echo $earn_incentives; ?>"
                                    placeholder="Enter earn..." />
                                <input type="hidden" name="earn_reimburse[]" value="<?php echo $earn_reimburse; ?>"
                                    placeholder="Enter earn..." />


                                <input type="hidden" name="deduc_total[]" value="<?php echo $deduc_total; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_late[]" value="<?php echo $deduc_late; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_absent[]" value="<?php echo $deduc_absent; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_pagibig[]" value="<?php echo $deduc_pagibig; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_sss[]" value="<?php echo $deduc_sss; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_philhealth[]" value="<?php echo $deduc_philhealth; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_undertime[]" value="<?php echo $deduc_undertime; ?>"
                                    placeholder="Enter deduc..." />
                                <input type="hidden" name="deduc_tax[]" value="<?php echo $deduc_tax; ?>"
                                    placeholder="Enter deduc..." />
                            </div>
                            <?php } ?>
                            <hr>
                            <label class="container top">SELECT ALL EMPLOYEE
                                <input onclick="checkAll(this)" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <?php  
                                while ($emp_salary_row = mysqli_fetch_array($add_emp_salary)) {
                                 
                                    ?>
                            <label class="container"> <?php echo $emp_salary_row['emp_name']; ?>
                                <input type="checkbox" name="employee[]"
                                    value="<?php echo $emp_salary_row['emp_no']; ?>">
                                <span class="checkmark"></span>
                            </label>
                            <?php } ?>

                            <div class="form-button">
                                <button id="submit" type="submit" class="btn-add" name="add">SUBMIT</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <?php include('right-sidenav.php') ?>
        </div>
    </section>

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

    <script src="js/payroll.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    $(function() {
        $('input[id$=datepicker]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    </script>

    <script>
    var form = document.getElementById("save");
    login.addEventListener("submit", function(e) {
        var valid = true;
        var inputs = login.querySelectorAll("input");
        [].forEach.call(inputs, function(input) {
            if (input.value === "") {
                valid = false;
                input.classList.add("error");
            }
        });

        if (!valid)
            e.preventDefault();
    });
    </script>



</body>

</html>