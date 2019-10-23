<?php
	require_once 'dbcon.php';

	for ($i = 0; $i < count($_POST['employee']); $i++) { 
		$subjects = mysqli_real_escape_string($mysqli, $_POST['employee'][$i]);
		$pending = 'Pending';

		if (empty(trim($subjects))) {
			continue;
		}

			// mysqli_query($conn, "INSERT INTO `member` VALUES('$subjects')") or die(mysqli_error());

			$sharing = "INSERT INTO tbl_salary (emp_no, salary_status)
			VALUES('$subjects','$pending' )";
			mysqli_query($mysqli, $sharing);
	}

	if (mysqli_error($mysqli)) {
		echo "Data base error occured";
	} else {
	
		echo "<script>alert('You successfully added one Employee!')</script>";
    	echo "<script>window.open('dashboard.php','_self')</script>";
	}

	
	
?>