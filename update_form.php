<?php 
	session_start();
	require_once('conDB.php');
	$updtID=$_GET['updtID']; 
	$sqlUpdtShow = "SELECT * FROM task_tbl WHERE id='$updtID'";
	$qryUpdtShow = mysqli_query($conn,$sqlUpdtShow);
	$recUpdtShow = mysqli_fetch_object($qryUpdtShow);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
</head>
<body>

	<div align="center">
		<h1>TODO List</h1><hr>
		<?php 
				if(@$_SESSION['msg']!=""){
					echo $_SESSION['msg']; 
					echo $_SESSION['msg']="";
				}
			?>
		<form action="update.php" method="post">
			<label>Id:: </label>
			<input type="text" disabled="disabled" value="<?php echo $recUpdtShow->id;?>" >
			<input type="hidden" name="id" value="<?php echo $updtID; ?>">
			<br><br>
			<label>Date:: </label>
			<input type="date" name="date" value="<?php echo $recUpdtShow->date;?>" ><br><br>
			<label>Time:: </label>
			<input type="time" name="time" value="<?php echo $recUpdtShow->time;?>" ><br><br>
			<label>Task:: </label>
			<input type="text" name="task" value="<?php echo $recUpdtShow->task;?>" ><br><br>
			<input type="Submit" name="updateBtn" value="Update">
		</form>
		
	</div>


</body>
</html>