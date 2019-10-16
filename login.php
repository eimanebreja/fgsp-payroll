<?php
session_start();

?>
<?php
include 'dbcon.php';
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE user_name='$username' AND user_pass ='$password'");
    $num_row = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if ($num_row > 0) {
        header('location:dashboard.php');
        $_SESSION['id'] = $row['user_id'];
    } else {echo "<script type='text/javascript'>alert('Invalid Username or Password!');
									document.location='index.php'</script>";?>
<?php
}}

?>