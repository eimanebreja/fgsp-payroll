<?php
    include_once 'dbcon.php';
	if (isset($_POST['image_upload'])){
        $emp_id = $_POST['id'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
        $location = "upload/" . $_FILES["image"]["name"]; 
        $sql = "UPDATE tbl_employee SET emp_image='$location' WHERE emp_id='$emp_id'";
        mysqli_query($mysqli, $sql);

	?>

<?php
      echo "<script>alert('You successfully edit one Employee!')</script>";
      echo "<script>window.open('list-employee-view.php?id=$emp_id','_self')</script>";
}
?>