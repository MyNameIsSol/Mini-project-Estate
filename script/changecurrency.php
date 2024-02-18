<?php
 include("db.php");
    if(isset($_POST['change_c'])){
        $currency = mysqli_real_escape_string($conn,$_POST['currency']);
        if (!empty($currency)) {
            $sql ="UPDATE admins SET currency ='$currency'";
                if(!mysqli_query($conn,$sql)){
                    die("Error: ".mysqli_error($conn));
                    exit();
                }
                header("Location:../admin/dashboard.php?curr_updated");
                exit(); 
        }         
    }     
    ?>