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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body id="dashboard">

    <?php include 'nav.php'; ?>

    <section>
        <div class="container-area">
            <?php include('left-sidenav.php') ?>
            <div class="area-content">
                <div class="add-emp">
                    Add Employee
                </div>
                <div class="add-emp-area">
                    <form method="POST" id="login" action="add-employee-query.php">
                        <div class="emp-area-title">
                            PERSONAL INFORMATION
                        </div>

                        <div class="add-emp-flex">
                            <div class="add-emp-image">
                                <img src="image/no_image.png" alt="">
                            </div>
                            <div class="add-emp-input">
                                <span> Employee Number :</span>
                                <input class="emp-no" type="text" value="" name="emp_no"
                                    placeholder="Enter employee id..." required />
                                <div class="name">
                                    <div class="name-bases">
                                        <span> Lastname :</span>
                                        <input type="text" id="input-lastname" name="lname"
                                            placeholder="Enter lastname..." required />
                                    </div>
                                    <div class="name-bases">
                                        <span> Firstname :</span>
                                        <input type="text" id="input-firstname" name="fname"
                                            placeholder="Enter firstname..." required />
                                    </div>
                                    <div class="name-bases">
                                        <span> Middlename :</span>
                                        <input type="text" id="input-middlename" name="mname"
                                            placeholder="Enter middlename..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span> Email :</span>
                                <input type="email" id="input-email" name="email" placeholder="Enter email..." required>
                            </div>
                            <div class="add-emp-base">
                                <span> Contact Number :</span>
                                <input type="text" id="input-phone" name="phone" placeholder="Enter phone...">
                            </div>
                            <div class="add-emp-base">
                                <span> Date Hired :</span>
                                <input type="text" id="hired" name="hire" placeholder="Enter date hired...">
                            </div>
                            <div class="add-emp-base">
                                <span> Position :</span>
                                <input type="text" id="input-position" name="position" placeholder="Enter Position..."
                                    required />
                            </div>

                            <div class="add-emp-base">
                                <span> Birthday :</span>
                                <input type="text" id="input-bday" name="bday" placeholder="Enter birthday...">
                            </div>
                            <div class="add-emp-base">
                                <span> BDO Account :</span>
                                <input type="text" id="input-position" name="bdo" placeholder="Enter BDO account..." />
                            </div>
                        </div>
                        <div class="emp-area-title other-title">
                            OTHER INFORMATION
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span>PHILHEALTH :</span>
                                <input type="text" id="input-philhealth" name="philhealth"
                                    placeholder="Enter PHILHEALTH Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> SSS :</span>
                                <input type="text" id="input-sss" name="sss" placeholder="Enter SSS Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> PAG-IBIG :</span>
                                <input type="text" id="input-pagibig" name="pagibig"
                                    placeholder="Enter PAG-IBIG Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> TIN :</span>
                                <input type="text" id="input-tin" name="tin" placeholder="Enter TIN number...">
                            </div>
                        </div>

                        <div class="emp-area-title other-title">
                            IN CASE OF EMERGENCY
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span>Guardian :</span>
                                <input type="text" id="input-guardin" name="guardian" placeholder="Enter guardian...">
                            </div>
                            <div class="add-emp-base">
                                <span> Contact Number :</span>
                                <input type="text" id="input-gphone" name="gphone"
                                    placeholder="Enter guardian contact number...">
                            </div>
                        </div>
                        <div class="form-button">
                            <button type="submit" id="save" class="btn-add" name="add_emp">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include('right-sidenav.php');?>


        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function() {
        $('input[id$=datepicker]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    $(function() {
        $('input[id$=hired]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    $(function() {
        $('input[id$=input-bday]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    </script>

    <!-- <script>
    var form = document.getElementById("login");
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
    </script> -->


</body>

</html>