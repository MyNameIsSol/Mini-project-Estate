<?php
	include 'db.php';
	if(isset($_POST['details'])){
		isset($_POST['full_name']) ? $full_name = mysqli_real_escape_string($conn,$_POST['full_name']) : $full_name = " ";
        isset($_POST['position']) ? $position = mysqli_real_escape_string($conn,$_POST['position']) : $position = " ";
        isset($_POST['phone']) ? $phone = mysqli_real_escape_string($conn,$_POST['phone']) : $phone = " ";
        isset($_POST['email']) ? $email = mysqli_real_escape_string($conn,$_POST['email']) : $email = " ";
        isset($_POST['address']) ? $address = mysqli_real_escape_string($conn,$_POST['address']) : $address = " ";

		$img =  $_FILES['profile']['name'];

		// IMAGE 
        if(!empty($img)){
        $target = "../admin/profile/".basename($_FILES['profile']['name']);
        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $fileSize = $_FILES['profile']['size'];
        $returned_val = validateImageUpload($target, $fileType, $fileSize);
        if($target == $returned_val){ 
		$sql = "UPDATE admins

				SET full_name='$full_name',position='$position',phone='$phone',email ='$email',address='$address',image='$img'

				WHERE email = '$email'
		";

		move_uploaded_file($_FILES['profile']['tmp_name'], $target);
		if(!mysqli_query($conn,$sql)){
            die("Error: ".mysqli_error($conn));
            exit();
        }

        header("Location:../admin/dashboard.php?prof_updated");
		exit();
        }else{
            $error = $returned_val;
            header("Location:../admin/dashboard.php?image_error=".$error);
        }
    }else{
        $sql = "UPDATE admins

        SET full_name='$full_name',position='$position',phone='$phone',email ='$email',address='$address'

        WHERE email = '$email'
    ";
    if(!mysqli_query($conn,$sql)){
        die("Error: ".mysqli_error($conn));
        exit();
    }
    header("Location:../admin/dashboard.php?prof_updated");
    exit();
    }

    }else{
        $error = "Sorry, we could not update your details...";
		header("Location:../admin/dashboard.php?error=".$error);
		exit();
	}

    //standard image validation
    function validateImageUpload($file,$fileExe,$fileSize){
        $exeArray = array("jpg","png","jpeg","gif");
        if(file_exists($file)){
            unlink($file);
        }
            if(in_array($fileExe,$exeArray)){
                if($fileSize < 2097152){
                    $message = $file;
                }else{
                    $message = "File size too large, Must be exactly 2 MB";
                }
            }else{
                $message = "File format not allowed, please choose a jpg or png or jpeg or gif file.";
            }
            return $message;
    }