<?php
session_start();
include 'db.php';

    if(isset($_POST['change_p'])){
		$email = mysqli_real_escape_string($conn,$_POST['email']);
        $old_pass = mysqli_real_escape_string($conn,$_POST['old_pass']);
        $new_pass = mysqli_real_escape_string($conn,$_POST['new_pass']);
        $c_pass = mysqli_real_escape_string($conn,$_POST['c_pass']);
        if(empty($old_pass) || empty($new_pass) || empty($c_pass)){
            header("Location:../admin/dashboard.php?field_emt");
            exit();
        }elseif($new_pass != $c_pass){
            header("Location:../admin/dashboard.php?p_not_mach");
            exit();
        }else{
            $sql = "SELECT * FROM admins WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check < 1){
                header("Location:../admin/dashboard.php?invalid_admin");
                exit();
            }else{
                while($row=mysqli_fetch_assoc($result)){
                 $db_pwd = $row['password'];
                }
                 if($old_pass != $db_pwd){
                 header("Location:../admin/dashboard.php?db_pass_error");
                 exit();
                 }elseif($old_pass == $db_pwd){
                    $sql = "UPDATE admins SET password='$new_pass' WHERE email = '$email'";
                    mysqli_query($conn,$sql);
                    header("Location:../admin/dashboard.php?pass_chng");
                    exit();
                }   
            }
    }
    }else{
        header("Location:../admin/dashboard.php?invalid_cmd");
        exit();
    }

    ?>