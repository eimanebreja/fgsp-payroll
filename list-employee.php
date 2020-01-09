<?php include 'session.php';?>
<?php

include_once "dbcon.php";
$result_employee = mysqli_query($mysqli, "SELECT * FROM tbl_overview LEFT JOIN tbl_employee on tbl_overview.emp_no = tbl_employee.emp_no  order by emp_id DESC");
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$result_emp = mysqli_query($mysqli, "SELECT * FROM tbl_employee");
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
                <div class="employee-list">
                    <div class="add-emp">
                        List of Employee
                    </div>
                    <div class="emp-list">
                        <div class="no head">
                            EMP NO
                        </div>
                        <div class="name head">
                            NAME
                        </div>
                        <div class="date head">
                            DATE HIRED
                        </div>

                        <div class="action head">
                            ACTION
                        </div>
                    </div>
                    <div class="emp-list">
                        <?php
            $i = 1;
            while ($employee_row = mysqli_fetch_array($result_emp)) {$id = $employee_row['emp_id'];?>
                        <div class="no">
                            <?php echo $employee_row['emp_no']; ?>
                        </div>
                        <div class="name">
                            <a id="<?php echo $id; ?>" href="list-employee-view.php<?php echo '?id=' . $id; ?>">
                                <?php echo $employee_row['emp_name']; ?> </a>
                        </div>
                        <div class="date">
                            <?php echo $employee_row['emp_dhired']; ?>
                        </div>
                        <div class="action">
                            <span><a id="<?php echo $id; ?>" href="delete-employee.php<?php echo '?id=' . $id; ?>"
                                    onclick="return confirm('Are you sure you want to delete?');"><i
                                        class=" fa fa-minus-square trash" aria-hidden="true"></i></a></span>
                        </div>
                        <?php } ?>
                    </div>
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

</body>

</html>