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
                <div class="event-title-header">
                    Add Event
                </div>

                <div class="event-body-area">
                    <form action="add-event-query.php" method="POST">
                        <div class="event-label">
                            Event Name
                        </div>
                        <div class="event-input">
                            <input type="text" name="event_name" placeholder="Enter event name..." required>
                        </div>
                        <div class="event-label">
                            Event Date
                        </div>
                        <div class="event-input">
                            <input id="event_date_id" type="text" name="event_date" placeholder="Enter event date..."
                                required>
                        </div>
                        <div class="event-label">
                            Event Description
                        </div>
                        <div class="event-input">
                            <textarea name="event_desc" id="" cols="30" rows="10"
                                placeholder="Enter event description..."></textarea>
                        </div>
                        <div class="event-button">
                            <button name="event_btn">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include('right-sidenav.php') ?>

        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(function() {
        $('input[id$=event_date_id]').datepicker({
            dateFormat: 'MM d, yy'
        });
    });
    </script>


</body>



</html>