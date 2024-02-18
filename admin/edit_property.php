
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
            $currency= $data['currency'];
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
<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 19:47:54 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Elite Expert - Edit properties</title>
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

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-flpid">
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
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-flpid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <div class="user-profile-box mb-0">
                        <div class="sidebar-header">
                                <img src="../elite_logo.png" style="width: 240px; height: 80px;" alt="header-logo2.png"> 
                            </div>
                            <div class="header clearfix">
                                <?php
                                if(!empty($profile_image)){
                                echo'<img src="profile/'.$profile_image.'" alt="avatar" class="img-fluid profile-img">';
                                }else{
                                    echo'<img src="images/testimonials/ts-.jpg" alt="MA" class="img-fluid profile-img">'; 
                                }
                                ?>
                            </div>
                            <div class="active-user">
                                <h2><?= $full_name ?></h2>
                            </div>
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                <li>
                                        <a class="active" href="dashboard.php">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user-profile.php">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-listings.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="add-property.php">
                                            <i class="fa fa-list" aria-hidden="true"></i>Add Property
                                        </a>
                                    </li>
                                    <li>
                                        <a href="create_invoice.php">
                                            <i class="fas fa-credit-card"></i>Create Invoice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change_currency.php">
                                                <i class="fas fa-dollar mr-3"></i>Change Site Currency
                                            </a>
                                        </li>
                                    <li>
                                    <li>
                                        <a href="view_invoice.php">
                                            <i class="fas fa-paste"></i>Invoices
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.php">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
                        <div class="col-lg-12 mobile-dashbord dashbord">
                            <div class="dashboard_navigationbar dashxl">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i>
                                        Dashboard Navigation</button>
                                    <ul id="myDropdown" class="dropdown-content">
                                    <li>
                                            <a class="active" href="dashboard.php">
                                                <i class="fa fa-map-marker mr-3"></i> Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.php">
                                                <i class="fa fa-user mr-3"></i>Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="my-listings.php">
                                                <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a href="add-property.php">
                                                <i class="fa fa-list mr-3" aria-hidden="true"></i>Add Property
                                            </a>
                                        </li>
                                        <li>
                                            <a href="create_invoice.php">
                                                <i class="fas fa-credit-card mr-3"></i>Create Invoice
                                            </a>
                                        </li>
                                        <li>
                                            <a href="view_invoice.php">
                                                <i class="fas fa-paste mr-3"></i>Invoices
                                            </a>
                                        </li>
                                        <li>
                                            <a href="change-password.php">
                                                <i class="fa fa-lock mr-3"></i>Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="logout.php">
                                                <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                         include("../script/db.php");
                        if(isset($_POST['pid'])){
                            $pid = $_POST['pid'];
                        }elseif(isset($_GET['pid'])){
                            $pid = $_GET['pid'];
                        }
                        $sql = "SELECT * FROM properties WHERE property_id='$pid'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                            while($data = mysqli_fetch_assoc($result)){
                                $image1 = $data['image1'];
                                $image2 = $data['image2'];
                                $image3 = $data['image3'];
                                $property_type = $data['property_type'];
                                $property_title = $data['property_title'];
                                $property_descrip = $data['property_descrip'];
                                $property_status = $data['property_status'];
                                $bedroom_no = $data['bedroom_no'];
                                $bathroom_no = $data['bathroom_no'];
                                $property_size = $data['property_size'];
                                $property_price = $data['property_price'];
                                $currency = $data['currency'];
                                $address = $data['address'];
                                $city = $data['city'];
                                $state = $data['state'];
                                $country = $data['country'];
                                $date_added = $data['date_added'];
                            }
                        }
                        ?>
                        <form action="../script/update_property.php" method="post" enctype="multipart/form-data">

                            <div class="single-add-property">
                                <h3>Update Property Information <span style="color:red">(Please reselect all image in order to save images)</span></h3>
                                <div class="property-form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <input type="hidden" name="pid" value="<?= $pid ?>">
                                            <label for="property_image">Property Image</label>
                                            <input type="file" name="image1" id="property_image"
                                                placeholder="Add your property image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="image">Add image (one)</label>
                                            <input type="file" name="image2" id="image1"
                                                placeholder="Add your property image">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image">Add image (two)</label>
                                            <input type="file" name="image3" id="image2"
                                                placeholder="Add your property image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Property Title</label>
                                                <input type="text" name="title" value="<?= $property_title ?>"
                                                    id="title" placeholder="Enter your property title">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Property Description</label>
                                                <textarea name="descrip"
                                                    value="<?= $property_descrip ?>"
                                                    placeholder="Describe about your property"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <label for="property_type">Select Property Type</label>
                                            <select name="property_type" class="form-control-range"
                                                value="<?= $property_type ?>"
                                                placeholder="Please select a property type">
                                                <option value="">Select An Option</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Apartment">Apartment</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <label for="property_status">Select Property Status</label>
                                            <select name="property_status" value="<?= $property_status ?>"
                                                class="form-control-range"
                                                placeholder="Please select a property status">
                                                <option value="">Select An Option (Rent/Sale)</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Sale">Sale</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <label for="property_bedrooms">No. of bedrooms</label>
                                            <select name="property_bedrooms" value="<?= $bedroom_no ?>"
                                                class="form-control-range" placeholder="Please select bedroom number">
                                                <option value="">Select An Option</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <label for="property_bathroom">No. of bathroom</label>
                                            <select name="property_bathroom" value="<?= $bathroom_no ?>"
                                                class="form-control-range" placeholder="Please select bathroom number">
                                                <option value="">Select An Option</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Price</label>
                                                <input type="number" name="price" value="<?= $property_price ?>"
                                                    placeholder="USD" >
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="size">Size/Area</label>
                                                <input type="number" name="size" value="<?= $property_size ?>"
                                                    placeholder="Sqft">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p>
                                                <label for="address">Address</label>
                                                <input type="text" name="address" value="<?= $address ?>"
                                                    placeholder="Enter Your Address" >
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p>
                                                <label for="city">City</label>
                                                <input type="text" name="city" value="<?= $city ?>"
                                                    placeholder="Enter Your City" >
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p>
                                                <label for="state">State</label>
                                                <input type="text" name="state" value="<?= $state ?>"
                                                    placeholder="Enter Your State" >
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p>
                                                <label for="country">Country</label>
                                                <input type="text" name="country" value="<?= $country ?>"
                                                    placeholder="Enter Your Country" >
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Date Added</label>
                                                <input type="text" name="date" value="<?= $date_added ?>"
                                                     placeholder="Enter Date">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-add-property">
                                <div class="add-property-button pt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="prperty-submit-button">
                                                <button type="submit" name="update_property">Update Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="second-footer">
            <div class="container">
                <p>2021 © Copyright - All Rights Reserved.</p>
                <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By Elite Expert Team</p>
            </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/dashbord-mobile-menu.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/dropzone.js"></script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>
        <script>
        $(".dropzone").dropzone({
            dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
        });
        </script>
        <script>
        $(".header-user-name").on("click", function() {
            $(".header-user-menu ul").toggleClass("hu-menu-vis");
            $(this).toggleClass("hu-menu-visdec");
        });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 19:47:56 GMT -->

</html>