<?php
	require_once 'dbcon.php';

	for ($y = 0; $y < count($_POST['employee']); $y++) { 
		$employees = mysqli_real_escape_string($mysqli, $_POST['employee'][$y]);
		$total_earn = mysqli_real_escape_string($mysqli, $_POST['earn_total'][$y]);
		$total_deduc = mysqli_real_escape_string($mysqli, $_POST['deduc_total'][$y]);
		$pending = 'Pending';
		$pay_sched = $_POST['payroll_scheds'];
		$cut_sched = $_POST['cutoff'];
// Adding earning in Earning table 
		$earn_salary = mysqli_real_escape_string($mysqli, $_POST['earn_salary'][$y]);
		$earn_allowance = mysqli_real_escape_string($mysqli, $_POST['earn_allowance'][$y]);
		$earn_overtime = mysqli_real_escape_string($mysqli, $_POST['earn_overtime'][$y]);
		$earn_incentives = mysqli_real_escape_string($mysqli, $_POST['earn_incentives'][$y]);
		$earn_reimburse = mysqli_real_escape_string($mysqli, $_POST['earn_reimburse'][$y]);
 // Adding deduction in Deduction table
		$deduc_late = mysqli_real_escape_string($mysqli, $_POST['deduc_late'][$y]);
		$deduc_absent = mysqli_real_escape_string($mysqli, $_POST['deduc_absent'][$y]);
		$deduc_pagibig = mysqli_real_escape_string($mysqli, $_POST['deduc_pagibig'][$y]);
		$deduc_sss = mysqli_real_escape_string($mysqli, $_POST['deduc_sss'][$y]);
		$deduc_philhealth = mysqli_real_escape_string($mysqli, $_POST['deduc_philhealth'][$y]);
		$deduc_undertime = mysqli_real_escape_string($mysqli, $_POST['deduc_undertime'][$y]);
		$deduc_tax = mysqli_real_escape_string($mysqli, $_POST['deduc_tax'][$y]);

		
		if (empty(trim($employees))) {
			continue;
		}

			// Earning query
			$over_query = "INSERT INTO tbl_overview (over_id, earn_salary, earn_allowance, earn_overtime, earn_incentives, earn_reimburse, earn_total, deduc_late, deduc_absent, deduc_pagibig, deduc_sss, deduc_philhealth, deduc_undertime, deduc_tax, deduc_total, emp_no, salary_status)
			VALUES('null','$earn_salary','$earn_allowance','$earn_overtime','$earn_incentives','$earn_reimburse', '$total_earn','$deduc_late','$deduc_absent','$deduc_pagibig','$deduc_sss','$deduc_philhealth', '$deduc_undertime', '$deduc_tax', '$total_deduc','$employees', '$pending')";
			mysqli_query($mysqli, $over_query);

			$last_id = mysqli_insert_id($mysqli);
		// Total Salary query

			$salary_query = "INSERT INTO tbl_salary (emp_no, salary_status, payroll_sched, cutoff_sched, over_id)
			VALUES('$employees','$pending','$pay_sched','$cut_sched','$last_id')";
			mysqli_query($mysqli, $salary_query);
	
	}

	//Adding single date
	// $pays_sched = $_POST['payroll_sched'];
	// $pay_cutoff = $_POST['cutoff'];
	// $date = "INSERT INTO tbl_date (payroll_sched, cutoff_sched)
	// VALUES('$pays_sched','$pay_cutoff')";
	// mysqli_query($mysqli, $date);


	if (mysqli_error($mysqli)) {
		echo "Data base error occured";
	} else {	
		echo "<script>alert('You successfully add the payroll!')</script>";
   		echo "<script>window.open('payroll.php','_self')</script>";
	}
	
	
?>