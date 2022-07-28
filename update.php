<?php
session_start();
require_once ("conDB.php");
if (isset($_POST['updateBtn']) == "Update") {
	$id = $_POST['id'];	
	$date = date_format(date_create($_POST['date']),"Y-m-d");
	$time = $_POST['time'];	
	$task = $_POST['task'];
	/*Update into tbl_info*/
	$updtSQL= "UPDATE task_tbl SET date='$date',time='$time',task='$task' WHERE id='$id'";
	$updtQry = @mysqli_query($conn,$updtSQL) or die("Error in Table Info Update: ".mysqli_error($conn));
	/*Success or Error Message*/
	if($updtQry){
		$_SESSION['msg'] = "<h4 style='color:blue'>Data Succefully Updated</h4>";
	}else{
		$_SESSION['msg'] = "<h4 style='color:red'>Not Updated</h4>";
	}
	header('Location: ' . BASE);
}
?>