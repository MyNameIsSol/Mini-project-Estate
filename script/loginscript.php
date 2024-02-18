<?php
    include 'db.php';
    $tbname = 'admins';
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            admin_id VARCHAR(55) NOT NULL,
            full_name VARCHAR(225) NOT NULL,
            position VARCHAR(225) NOT NULL,
            admin_type VARCHAR(225) NOT NULL,
            image VARCHAR(225) NOT NULL,
            phone VARCHAR(225) NOT NULL,
            currency VARCHAR(225) NOT NULL,
            email VARCHAR(225) NOT NULL,
            password VARCHAR(225) NOT NULL,
            address VARCHAR(225) NOT NULL';
            
            $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
            if(!mysqli_query($conn,$sql)){
                die("Error: ".mysqli_error($conn));
                exit();
            }

            $aname = "Elite Expert";
            $aemail = "eliteexpertproperties@gmail.com";
            $apasswd = "Mollet63@";
            $position = "Manager";
            $encrpt = md5($aemail.time());
            $aid ="ad".substr($encrpt,0,3).substr($encrpt,-3,3);
            $atype = "super";
            $image = " ";
            $currency = "$";
            $sql = "SELECT * FROM admins WHERE email='$aemail'";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check < 1){
                $sql ="INSERT INTO admins (admin_id,full_name,position,admin_type,image,phone,currency,email,password,address) VALUES ('$aid','$aname','$position','$atype','$image','','$currency','$aemail','$apasswd','')";
                if(!mysqli_query($conn,$sql)){
                    die("Error: ".mysqli_error($conn));
                    exit;
                }
            }

    if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        if(empty($email) || empty($password)){
            header("Location:../admin/login.php?loginempty");
            exit();
        }
        
            $sql = "SELECT * FROM admins WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check == 1){
                while($row=mysqli_fetch_assoc($result)){
                 $dbpass = $row['password'];
                 $dbemail = $row['email'];
                 $admin_id = $row['admin_id'];
                }
                 if($password != $dbpass){
                 header("Location:../admin/login.php?invalidpwd");
                 exit();
                 }
                 if($password == $dbpass){
                     session_start();
                     $_SESSION['adminid'] = $admin_id;
                    header("Location:../admin/dashboard.php?loginsuc");
                    exit();
                 }
             }else{
                header("Location:../admin/login.php?invaliduid");
                exit();
             }
         
        
    }else{
        header("Location:../admin/login.php?loginerror");
        exit();
    }

    ?>