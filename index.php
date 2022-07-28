<?php session_start(); 
	require_once('display.php');
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
		<form action="insertAction.php" method="post">
			<label>Date:: </label>
			<input type="date" name="date"><br><br>
			<label>Time:: </label>
			<input type="time" name="time"><br><br>
			<label>Task:: </label>
			<input type="text" name="task"><br><br>
			<input type="Submit" name="addBtn" value="Add">
		</form>
		
	</div>
	<hr>

	<div>
			<span style="text-align: center"><h3>List</h3>
			</span>

			<table border="1" align="center">
				<tr style="background: #d5dbdb;">
					<th>Serial</th>
					<th>Date</th>
					<th>Time</th>
					<th>Task</th>
					<th>Action</th>
				</tr>
				<?php if($numData>0){
					$i=0;
						while($recShow = mysqli_fetch_object($qryShow)){
							if($i%2==1){ $rowColor='#aed6f1';}else{$rowColor='none';}				
				?>
				<tr style="background: <?php echo $rowColor;?> ;">
					<td><?php echo $recShow->id; ?></td>
					<td><?php echo $recShow->date; ?></td>
					<td><?php echo $recShow->time; ?></td>
					<td><?php echo $recShow->task; ?></td>
					<td>
						<a target="_blank" href="update_form.php?updtID=<?php echo $recShow->id;?>">Update</a> /
						<a href="delete.php?dltID=<?php echo $recShow->id;?>">Delete</a>
					</td>
				</tr>
				<?php $i++;}}?>
			</table>			
		</div>
		<div>
			<span style="text-align: center"><h3>Search Task</h3>
			</span>
			<table border="1" align="center">
				<tr>
					<td colspan="3">
						<form action="" method="post" enctype="multipart">
							<input type="date" name="date" />
							<input type="submit" name="btnSrch" value="Search" />
						</form>
					</td>
				</tr>
			<?php if(@$numSrch>0){ ?>
				<tr style="background: #d5dbdb;">
					<th>Serial</th>
					<th>Date</th>
					<th>Time</th>
					<th>Task</th>
					<th>Action</th>
				</tr>
				<tr>
					<td><?php echo $recShow->id; ?></td>
					<td><?php echo $recShow->date; ?></td>
					<td><?php echo $recShow->time; ?></td>
					<td><?php echo $recShow->task; ?></td>
					<td>
						<a target="_blank" href="update_form.php?updtID=<?php echo $recShow->id;?>">Update</a> /
						<a href="delete.php?dltID=<?php echo $recShow->id;?>">Delete</a>
					</td>
				</tr>
				<?php }?>
			</table>			
		</div>

</body>
</html>