<div class="add-emp">
    Add Employee
</div>
<div class="add-employee-form">
    <form method="POST" action="add-employee-query.php">
        <div class="form-label">
            Employee Number :
        </div>
        <div class="form-input">
            <?php
                include_once "dbcon.php";
                $result_employee = mysqli_query($mysqli, "SELECT LPAD(emp_no, 3, '0') AS code FROM tbl_employee ORDER BY emp_id DESC LIMIT 1");
                $i = 1;
                while ($emp_row = mysqli_fetch_array($result_employee)) {
                $id = $emp_row['code'];
                $code_sum = $id + 1;
                $codes = str_pad($code_sum, 3, "0", STR_PAD_LEFT);
                ?>
            <input type="text" value="<?php echo $codes; ?>" name="emp_no" placeholder="Enter employee id..." />
            <?php }?>
        </div>
        <div class="form-label pad">
            Lastname :
        </div>
        <div class="form-input">
            <input type="text" name="lname" placeholder="Enter lastname..." />
        </div>
        <div class="form-label pad">
            Firstname :
        </div>
        <div class="form-input">
            <input type="text" name="fname" placeholder="Enter firstname..." />
        </div>
        <div class="form-label pad">
            Middlename :
        </div>
        <div class="form-input">
            <input type="text" name="mname" placeholder="Enter middlename..." />
        </div>

        <div class="form-label pad">
            Date Hired :
        </div>
        <div class="form-input">
            <input type="date" name="hire" placeholder="Enter firstname..." />
        </div>

        <div class="form-label pad">
            Salary :
        </div>
        <div class="form-input">
            <input type="text" name="salary" placeholder="Enter salary..." />
        </div>

        <div class="form-button">
            <button class="btn-add" name="add-emp">SUBMIT</button>
        </div>
    </form>

</div>