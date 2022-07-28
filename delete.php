<?php
require_once ("conDB.php");
/*DELETE*/
$dltID = $_GET['dltID'];
$sqlDelt = "DELETE FROM task_tbl WHERE id='$dltID'";
mysqli_query($conn,$sqlDelt);

		header('Location: ' . BASE);
?>