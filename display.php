<?php
require_once ("conDB.php");
$sqlShow = "SELECT * FROM task_tbl";
$qryShow = mysqli_query($conn,$sqlShow);
$numData = mysqli_num_rows($qryShow);

/*++Search++++*/
if(isset($_POST['btnSrch'])=="Search"){
	$srchID = date_format(date_create($_POST['date']),"Y-m-d");
	$sqlSrch = "SELECT * FROM task_table WHERE date='$srchID'";
	$qrySrch = mysqli_query($conn,$sqlSrch);
	$numSrch = mysqli_num_rows($qrySrch);
	$recSrch = mysqli_fetch_object($qrySrch);
}
?>