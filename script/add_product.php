<?php
    include 'db.php';
    $tbname = 'properties';
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            property_id VARCHAR(225) NOT NULL,
            image1 VARCHAR(225) NOT NULL,
            image2 VARCHAR(225) NOT NULL,
            image3 VARCHAR(225) NOT NULL,
            property_type VARCHAR(55) NOT NULL,
            property_title VARCHAR(225) NOT NULL,
            property_descrip VARCHAR(225) NOT NULL,
            property_status VARCHAR(55) NOT NULL,
            bedroom_no VARCHAR(55) NOT NULL,
            bathroom_no VARCHAR(55) NOT NULL,
            property_size VARCHAR(225) NOT NULL,
		    property_price VARCHAR(225) NOT NULL,
            currency VARCHAR(55) NOT NULL,
            address VARCHAR(225) NOT NULL,
            city VARCHAR(55) NOT NULL,
            state VARCHAR(55) NOT NULL,
            country VARCHAR(55) NOT NULL,
            date_added VARCHAR(225) NOT NULL';
            
            $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
            mysqli_query($conn, $sql);

    if(isset($_POST['add_prod'])){
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        isset($_POST['descrip']) ? $descrip = mysqli_real_escape_string($conn,$_POST['descrip']) : $descrip = " ";

        $property_type = mysqli_real_escape_string($conn,$_POST['property_type']);
        $property_status = mysqli_real_escape_string($conn,$_POST['property_status']);
        $property_bedrooms = mysqli_real_escape_string($conn,$_POST['property_bedrooms']);
        $property_bathroom = mysqli_real_escape_string($conn,$_POST['property_bathroom']);
        $size = mysqli_real_escape_string($conn,$_POST['size']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        isset($_POST['currency']) ? $currency = mysqli_real_escape_string($conn,$_POST['currency']) : $currency= "$";
        isset($_POST['address']) ? $address = mysqli_real_escape_string($conn,$_POST['address']) : $address = " ";
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);


        $encrpt = md5($title.time());
        $pid ="id".substr($encrpt,0,2).substr($encrpt,-2,2);
        $date_added = date('Y-m-d H:i:s');

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

        $sql = "SELECT * FROM properties WHERE property_id='$pid'";
        $result = mysqli_query($conn,$sql);
        $result_check = mysqli_num_rows($result);
        if($result_check == 1){
            header ("Location:../admin/dashboard.php?pidtaken");
            exit();
        }else{
            $sql ="INSERT INTO properties (property_id,image1,image2,image3,property_type,property_title,property_descrip,property_status,bedroom_no,bathroom_no,property_size,property_price,currency,address,city,state,country,date_added) VALUES ('$pid','$img1','$img2','$img3','$property_type','$title','$descrip','$property_status','$property_bedrooms','$property_bathroom','$size','$price','$currency','$address','$city','$state','$country','$date_added')";
            if(!mysqli_query($conn,$sql)){
                die("Error: ".mysqli_error($conn));
                exit();
            }
            header("Location:../admin/dashboard.php?p_added_suc");
            exit();
        }
                
    }     
    //standard image validation
     function validateImageUpload($file,$fileExe,$fileSize){
        $exeArray = array("jpg","png","jpeg","gif","WebP");
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