<?php 
	session_start();
	require_once('conDB.php');
	if (isset($_POST['addBtn']) == "Add") {
		$date = date_format(date_create($_POST['date']),"Y-m-d");	
		$time = $_POST['time'];	
		$task = $_POST['task'];	
		 
		/*Insert into tbl_info*/
		$insertData1 = "'', '$date','$time','$task'";
		$insertSQL1 = "INSERT INTO task_tbl VALUES($insertData1)";
		$insertQuery1 = @mysqli_query($conn,$insertSQL1) or die("Error in Table Info Insertion: ".mysqli_error($conn));
		/*Insert into tbl_user*/

		/*Success or Error Message*/
		if($insertQuery1){
			$_SESSION['msg'] = "<h4 style='color:blue'>Data Succefully Inserted</h4>";
		}else{
			$_SESSION['msg'] = "<h4 style='color:red'>Not Inserted</h4>";
		}
		header('Location: ' . BASE);
}
?>