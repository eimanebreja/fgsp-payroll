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
    <div class="expenses-report">
        <div class="expenses-report-body">
            <div class="expenses-mail">
                <div class="back-btn"> <a href="dashboard.php"><i class="fa fa-long-arrow-left"
                            aria-hidden="true"></i>BACK</a></div>
                <form id="frmEnquiry" action="" method="post" enctype='multipart/form-data'>
                    <div id="mail-status"></div>
                    <div class="ex-label">
                        To :
                    </div>
                    <div class="ex-input">
                        <input class="expenses-input" type="email" id="userEmail" name="userEmail"
                            placeholder="Enter receiver email...">
                    </div>
                    <div class="ex-label">
                        Subject :
                    </div>
                    <div class="ex-input">
                        <input class="expenses-input" id="subject" type="text" name="subject"
                            placeholder="Enter mail subject...">
                    </div>
                    <div class="ex-label">
                        Content :
                    </div>
                    <div class="ex-input">
                        <textarea name="content" id="content" cols="30" rows="7"
                            placeholder="Enter mail content..."></textarea>
                    </div>

                    <div class="ex-label">
                        Attached File :
                    </div>
                    <div class="ex-input">
                        <input type="file" name="attachment[]">
                    </div>
                    <div class="ex-button">
                        <button type="submit" name="mail_btn">SEND</button>

                    </div>
                </form>
                <div id="loader-icon" style="display: none;">
                    <img src="image/LoaderIcon.gif" />
                </div>
            </div>
        </div>
    </div>

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

    <script type="text/javascript">
    $(document).ready(function(e) {
        $("#frmEnquiry").on('submit', (function(e) {
            e.preventDefault();
            $('#loader-icon').show();
            var valid;
            valid = validateContact();
            if (valid) {
                $.ajax({
                    url: "mail-send.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $("#mail-status").html(data);
                        $('#loader-icon').hide();
                    },
                    error: function() {}

                });
            }
        }));

        function validateContact() {
            var valid = true;
            $(".demoInputBox").css('background-color', '');
            $(".info").html('');

            $("#userEmail").removeClass("invalid");
            $("#subject").removeClass("invalid");
            $("#content").removeClass("invalid");


            if (!$("#userEmail").val()) {
                $("#userEmail").addClass("invalid");
                $("#userEmail").attr("title", "Required");
                valid = false;
            }
            if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $("#userEmail").addClass("invalid");
                $("#userEmail").attr("title", "Invalid Email");
                valid = false;
            }
            if (!$("#subject").val()) {
                $("#subject").addClass("invalid");
                $("#subject").attr("title", "Required");
                valid = false;
            }
            if (!$("#content").val()) {
                $("#content").addClass("invalid");
                $("#content").attr("title", "Required");
                valid = false;
            }

            return valid;
        }

    });
    </script>

    <script>
    function myFunction() {
        window.print();
    }
    </script>

</body>

</html>