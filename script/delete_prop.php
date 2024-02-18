<?php
include 'db.php';
	if(isset($_GET['pid'])){
		$pid = mysqli_real_escape_string($conn,$_GET['pid']);

		$sql = "SELECT * FROM properties WHERE property_id='$pid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
			while($data = mysqli_fetch_assoc($result)){
				$sql = "DELETE FROM properties WHERE property_id='$pid'";
				mysqli_query($conn,$sql);
				header("Location:../admin/dashboard.php?prop_del");
				exit();

			}
		}	
	}
    ?>