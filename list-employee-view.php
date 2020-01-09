<?php include 'session.php';?>
<?php

include_once "dbcon.php";


$get_id = $_GET['id'];
$result_user = mysqli_query($mysqli, "SELECT * FROM tbl_user where user_id='$session_id'");
$user_row = mysqli_fetch_array($result_user);
$result_emp = mysqli_query($mysqli, "SELECT * FROM tbl_employee WHERE emp_id= '$get_id'");
$result_upload = mysqli_query($mysqli, "SELECT * FROM tbl_employee WHERE emp_id= '$get_id'");
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
                    <div id="open-modal" class="modal-window">
                        <div>
                            <a href="#" title="Close" class="modal-close">Close</a>
                            <h1>Change Employee Picture</h1>
                            <form method="POST" action="upload-image.php" enctype="multipart/form-data">
                                <?php  
                            while ($emp_rows = mysqli_fetch_array($result_upload)) {   
                                ?>
                                <input class="emp-no" type="hidden" name="id"
                                    value="<?php echo $emp_rows['emp_id']; ?>">
                                <?php } ?>
                                <input type="file" name="image">
                                <div class="image-button">
                                    <button type="submit" name="image_upload">UPLOAD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form method="POST" id="login" action="edit-employee-query.php">
                        <?php  
                            while ($emp_row = mysqli_fetch_array($result_emp)) {         
                                ?>
                        <div class="emp-area-title">
                            PERSONAL INFORMATION
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-image">
                                <img style="width:140px; height:140px" src="<?php echo $emp_row['emp_image']; ?>"
                                    alt="">
                                <div class="edit-pic">
                                    <a href="#open-modal">EDIT<i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="add-emp-input">
                                <input class="emp-no" type="hidden" value="<?php echo $emp_row['emp_id']; ?>"
                                    name="emp_id" placeholder="Enter employee id..." />
                                <span> Employee Number :</span>
                                <input class="emp-no" type="text" value="<?php echo $emp_row['emp_no']; ?>"
                                    name="emp_no" placeholder="Enter employee id..." disabled />

                                <div class="name">
                                    <div class="name-bases-list">
                                        <span> Name :</span>
                                        <input type="text" value="<?php echo $emp_row['emp_name']; ?>" id="input-name"
                                            name="fullname" placeholder="Enter name..." required />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span> Email :</span>
                                <input type="email" id="input-email" value="<?php echo $emp_row['emp_email']; ?>"
                                    name="email" placeholder="Enter email..." required>
                            </div>
                            <div class="add-emp-base">
                                <span> Contact Number :</span>
                                <input type="text" id="input-phone" value="<?php echo $emp_row['emp_contact']; ?>"
                                    name="phone" placeholder="Enter phone...">
                            </div>
                            <div class="add-emp-base">
                                <span> Date Hired :</span>
                                <input type="text" id="hired" value="<?php echo $emp_row['emp_dhired']; ?>" name="hire"
                                    placeholder="Enter date hired...">
                            </div>
                            <div class="add-emp-base">
                                <span> Position :</span>
                                <input type="text" id="input-position" value="<?php echo $emp_row['emp_position']; ?>"
                                    name="position" placeholder="Enter Position..." required />
                            </div>

                            <div class="add-emp-base">
                                <span> Birthday :</span>
                                <input type="text" id="input-bday" value="<?php echo $emp_row['emp_bday']; ?>"
                                    name="bday" placeholder="Enter birthday...">
                            </div>
                            <div class="add-emp-base">
                                <span> BDO Account :</span>
                                <input type="text" id="input-position"
                                    value="<?php echo $emp_row['emp_bdo_account']; ?>" name="bdo"
                                    placeholder="Enter BDO account..." />
                            </div>
                        </div>
                        <div class="emp-area-title other-title">
                            OTHER INFORMATION
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span>PHILHEALTH :</span>
                                <input type="text" id="input-philhealth" name="philhealth"
                                    value="<?php echo $emp_row['emp_philhealth']; ?>"
                                    placeholder="Enter PHILHEALTH Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> SSS :</span>
                                <input type="text" id="input-sss" name="sss" value="<?php echo $emp_row['emp_sss']; ?>"
                                    placeholder="Enter SSS Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> PAG-IBIG :</span>
                                <input type="text" id="input-pagibig" name="pagibig"
                                    value="<?php echo $emp_row['emp_pagibig']; ?>"
                                    placeholder="Enter PAG-IBIG Number...">
                            </div>
                            <div class="add-emp-base">
                                <span> TIN :</span>
                                <input type="text" id="input-tin" value="<?php echo $emp_row['emp_tin']; ?>" name="tin"
                                    placeholder="Enter TIN number...">
                            </div>
                        </div>

                        <div class="emp-area-title other-title">
                            IN CASE OF EMERGENCY
                        </div>
                        <div class="add-emp-flex">
                            <div class="add-emp-base">
                                <span>Guardian :</span>
                                <input type="text" id="input-guardin" name="guardian"
                                    value="<?php echo $emp_row['emp_ecp']; ?>" placeholder="Enter guardian...">
                            </div>
                            <div class="add-emp-base">
                                <span> Contact Number :</span>
                                <input type="text" id="input-gphone" name="gphone"
                                    value="<?php echo $emp_row['emp_ecp_no']; ?>"
                                    placeholder="Enter guardian contact number...">
                            </div>
                        </div>
                        <?php }?>
                        <div class="form-button">
                            <button type="submit" id="save" class="btn-add" name="edit_emps">SUBMIT</button>
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