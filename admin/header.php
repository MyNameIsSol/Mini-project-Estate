
<?php
	session_start();
	include '../script/db.php';
	$admin_id = $_SESSION['adminid'];
	if(isset($admin_id)){
		$sql = "SELECT * FROM admins WHERE admin_id='$admin_id' ";
		$result= mysqli_query($conn,$sql);
		$result_checker= mysqli_num_rows($result);
		if($result_checker > 0){
            while($data = mysqli_fetch_assoc($result)){
            $full_name = $data['full_name'];
            $position= $data['position'];
            $admin_type= $data['admin_type'];
            $profile_image= $data['image'];
            $phone= $data['phone'];
            $email= $data['email'];
            $address= $data['address']; 
            }
		}
	}else{
	header("Location:login.php?session_expire");
		exit();
	}

    $sql = "SELECT * FROM properties";
    $result = mysqli_query($conn,$sql);
    if($result == true){
        $total_properties = mysqli_num_rows($result);
    }

    $sql = "SELECT * FROM invoice";
    $result = mysqli_query($conn,$sql);
    if($result == true){
        $total_invoice = mysqli_num_rows($result);
    }
	?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 19:47:47 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Elite Expert - Find properties</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../elite_icon.png">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="revolution/css/settings.css">
    <link rel="stylesheet" href="revolution/css/layers.css">
    <link rel="stylesheet" href="revolution/css/navigation.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                                <a href="../index.php">
                                <img src="../elite_logo.png" style="width: 150px; height: 50px;" alt="header-logo2.png"> 
                                </a>
                            </div>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1">
                                <ul id="responsive">
                                <li><a href="dashboard.php">Home</a></li>
                                <li><a href="add-property.php">Add Property</a></li>
                                    <li><a href="my-listing.php">Listing</a></li>
                                    
                                    <li><a href="create_invoice.php">Create Invoice</a></li>
                                    <li><a href="view_invoice.php">Invoices</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0">
                                        <a href="add-property.php" class="button border btn-lg btn-block text-center">Add Listing<i class="fas fa-laptop-house ml-2"></i></a></li>
                            </ul>
                            </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / --> 
                        <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                <span>
                                <?php
                                if(!empty($profile_image)){
                                    echo '<img src="profile/'.$profile_image.'" alt="">';
                                }else{
                                    echo '<img src="images/testimonials/ts-.jpg" alt="MA">';
                                }
                                ?>
                            </span>Hi, <?= $full_name ?>
                            </div>
                            <ul>
                                <li><a href="user-profile.php"> Edit profile</a></li>
                                <li><a href="add-property.php"> Add Property</a></li>
                                <li><a href="view_invoice.php">  Invoice</a></li>
                                <li><a href="change-password.php"> Change Password</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                        <!-- Right Side Content / End -->
                    </div>
                </div>
                <!-- Header / End -->
            </header>

       