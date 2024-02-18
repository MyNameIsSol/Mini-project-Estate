<?php
    include 'db.php';
    $tbname = 'invoice';
    $tbcols = 'id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            invoice_id VARCHAR(225) NOT NULL,
            property_title VARCHAR(225) NOT NULL,
            amount VARCHAR(55) NOT NULL,
            vat VARCHAR(55) NOT NULL,
            discount VARCHAR(55) NOT NULL,
            property_status VARCHAR(55) NOT NULL,
            property_descrip VARCHAR(225) NOT NULL,
            buyer_name VARCHAR(55) NOT NULL,
            buyer_addr VARCHAR(225) NOT NULL,
		    buyer_phone VARCHAR(55) NOT NULL,
            buyer_company_name VARCHAR(55) NOT NULL,
            payment_type VARCHAR(55) NOT NULL,
            buyer_email VARCHAR(55) NOT NULL,
            company_name VARCHAR(225) NOT NULL,
            company_email VARCHAR(225) NOT NULL,
            company_addr VARCHAR(225) NOT NULL,
            date_created VARCHAR(55) NOT NULL';
            
            $sql = "CREATE TABLE IF NOT EXISTS $tbname($tbcols)";
            mysqli_query($conn, $sql);

    if(isset($_POST['create_invoice'])){
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        isset($_POST['descrip']) ? $descrip = mysqli_real_escape_string($conn,$_POST['descrip']) : $descrip = " ";

        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
        $property_status = mysqli_real_escape_string($conn,$_POST['property_status']);
        $vat = mysqli_real_escape_string($conn,$_POST['vat']);
        isset($_POST['discount']) ? $discount = mysqli_real_escape_string($conn,$_POST['discount']) : $discount = " ";

        $given_date = mysqli_real_escape_string($conn,$_POST['date']);
        $buyer_name = mysqli_real_escape_string($conn,$_POST['buyer-name']);
        isset($_POST['buyer-addr']) ? $buyer_addr = mysqli_real_escape_string($conn,$_POST['buyer-addr']) : $buyer_addr = " ";

        $buyer_phone = mysqli_real_escape_string($conn,$_POST['buyer-phone']);

        isset($_POST['BC-name']) ? $BC_name = mysqli_real_escape_string($conn,$_POST['BC-name']) : $BC_name = " ";

        isset($_POST['buyer-email']) ? $buyer_email = mysqli_real_escape_string($conn,$_POST['buyer-email']) : $buyer_email = " ";

        $payment_type = mysqli_real_escape_string($conn,$_POST['payment-type']);

        $c_name = mysqli_real_escape_string($conn,$_POST['c_name']);
        $CE_address = mysqli_real_escape_string($conn,$_POST['CE-address']);

        isset($_POST['C-address']) ? $C_address = mysqli_real_escape_string($conn,$_POST['C-address']) : $C_address = " ";
        $encrpt = mt_rand(1000,4000);
        $invoice_id ="402".substr($encrpt,0,2).substr($encrpt,-2,2);

        if($given_date == ""){
            $date_created = date('Y-m-d H:i:s');
        }else{
            $date_created = $given_date;
        }
                   

        $sql = "SELECT * FROM invoice WHERE invoice_id='$invoice_id'";
        $result = mysqli_query($conn,$sql);
        $result_check = mysqli_num_rows($result);
        if($result_check == 1){
            header ("Location:../admin/dashboard.php?inv_ext");
            exit();
        }else{
            $sql ="INSERT INTO invoice (invoice_id,property_title,amount,vat,discount,property_status,property_descrip,buyer_name,buyer_addr,buyer_company_name,buyer_phone,buyer_email,payment_type,company_name,company_email,company_addr,date_created) VALUES ('$invoice_id','$title','$amount','$vat','$discount','$property_status','$descrip','$buyer_name','$buyer_addr','$BC_name','$buyer_phone','$buyer_email','$payment_type','$c_name','$CE_address','$C_address','$date_created')";
            if(!mysqli_query($conn,$sql)){
                die("Error: ".mysqli_error($conn));
                exit();
            }
            header("Location:../admin/dashboard.php?inv_crt");
            exit();
        }
                
    }     
   
    ?>