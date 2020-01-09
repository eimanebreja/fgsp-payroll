<?php
include_once 'dbcon.php';
if (isset($_POST['event_btn'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_desc = $_POST['event_desc'];


    $sendsql = "SELECT * FROM tbl_employee";
    $send_query = mysqli_query($mysqli, $sendsql);
    $mail_body = '';
    $sendrow = '';
    $sendrow = mysqli_fetch_array($send_query);
    $email = $sendrow["emp_email"];
    $name = $sendrow["emp_name"];
        $to = "$email";                          
        $from = "nimuel24@gmail.com";
        $subject = "FGSP UPCOMING EVENT";
        $message =  "<h1>$event_name. </h1>";
        $message =  "<h3>$event_date. </h3>";
        $message =  "<p>$event_desc. </p>";
        
        $headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";
        $mail_result = mail($to, $subject, $message, $headers);
     
    $result_event = mysqli_query($mysqli, "INSERT INTO tbl_event (event_name, event_date, event_desc)
    VALUES('$event_name', '$event_date', '$event_desc')");
    echo "<script>alert('You successfully added one Event!')</script>";
    echo "<script>window.open('dashboard.php','_self')</script>";
    ?>
<?php
}
?>