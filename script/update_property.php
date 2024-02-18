<?php
 include("db.php");
    if(isset($_POST['update_property'])){
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        isset($_POST['descrip']) ? $descrip = mysqli_real_escape_string($conn,$_POST['descrip']) : $descrip = " ";
        $pid = mysqli_real_escape_string($conn,$_POST['pid']);
        $property_type = mysqli_real_escape_string($conn,$_POST['property_type']);
        $property_status = mysqli_real_escape_string($conn,$_POST['property_status']);
        $property_bedrooms = mysqli_real_escape_string($conn,$_POST['property_bedrooms']);
        $property_bathroom = mysqli_real_escape_string($conn,$_POST['property_bathroom']);
        $size = mysqli_real_escape_string($conn,$_POST['size']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        isset($_POST['address']) ? $address = mysqli_real_escape_string($conn,$_POST['address']) : $address = " ";
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);

        $date_added = $_POST['date'];

        if (!empty($_FILES['image1']['name']) && !empty($_FILES['image2']['name']) && !empty($_FILES['image3']['name'])) {
            $images = [];
            for ($i = 1; $i <= 3; $i++) {
                    $fieldName = 'image' . $i;
                $img = uniqid().'_'.basename($_FILES[$fieldName]['name']);
                $target = "../property/".$img;
                $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
                $fileSize = $_FILES[$fieldName]['size'];
                $returned_val = validateImageUpload($target, $fileType, $fileSize);
                if($target == $returned_val){ 
                    move_uploaded_file($_FILES[$fieldName]['tmp_name'], $target);
                    $images[] = $img;
                }else{
                    $error = $returned_val;
                    header("Location:../admin/dashboard.php?image_error=".$error);
                    exit();
                }
            }
        }
        $img1 = $images[0] ?? null;
        $img2 = $images[1] ?? null; 
        $img3 = $images[2] ?? null;                    


        $sql ="UPDATE properties SET image1='$img1',image2='$img2',image3='$img3',property_type='$property_type',property_title='$title',property_descrip='$descrip',property_status='$property_status',bedroom_no='$property_bedrooms',bathroom_no='$property_bathroom',property_size='$size',property_price='$price',address='$address',city='$city',state='$state',country='$country',date_added='$date_added' WHERE property_id = '$pid'";
        if(!mysqli_query($conn,$sql)){
            die("Error: ".mysqli_error($conn));
            exit();
        }
        header("Location:../admin/dashboard.php?p_update_suc");
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
    ?>