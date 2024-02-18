<?php
include 'db.php';
	if(isset($_GET['inid'])){
		$inid = mysqli_real_escape_string($conn,$_GET['inid']);

		$sql = "SELECT * FROM invoice WHERE invoice_id='$inid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check > 0){
			while($data = mysqli_fetch_assoc($result)){
				$sql = "DELETE FROM invoice WHERE invoice_id='$inid'";
				mysqli_query($conn,$sql);
				header("Location:../admin/dashboard.php?inv_del");
				exit();

			}
		}	
	}
    ?>