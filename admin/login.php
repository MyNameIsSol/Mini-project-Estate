<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from code-theme.com/html/findhouses/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 19:49:34 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Elite Expert - Login</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../elite_icon.png">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                        <a href="../index.php">
                                <img src="../elite_logo.png" style="width: 95px; height: 40px;" alt="header-logo2.png"> 
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
                                <li><a href="../index.php">Home</a></li>

                                   
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                    <div class="" style="width:115px" id="google_translate_element" class="mt-1 ml-1">

<div class="skiptranslate goog-te-gadget" dir="ltr" s="">
    <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"></div> 
</div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', 
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
</script>   
<script type="text/javascript" src="../translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
                    </div>
                    <!-- Right Side Content / End -->

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->

                        
                        <!-- <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="login.php">Sign In</a></div>
                        </div> -->
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- lang-wrap-->
                    <div class="header-user-menu user-menu add d-none d-lg-none d-xl-flex">
                        <!-- <div class="lang-wrap">
                            <div class="show-lang">
                                <span><i class="fas fa-globe-americas"></i><strong>ENG</strong></span><i class="fa fa-caret-down arrlan"></i>
                            </div>
                            <ul class="lang-tooltip lang-action no-list-style">
                                <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                                <li><a href="#" data-lantext="Fr">Francais</a></li>
                                <li><a href="#" data-lantext="Es">Espanol</a></li>
                                <li><a href="#" data-lantext="De">Deutsch</a></li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <style>
            .headings{
                background-image: url('images/bg/bg-details.jpg'); /* Replace with the path to your image */
                background-size: cover; /* Adjust as needed: cover, contain, or a specific size */
                background-position: center; /* Adjust as needed: center, top, right, bottom, left */
                background-repeat: no-repeat;
            }
        </style>

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1 class="text-center">Administrative Login</h1>
                    <h2 class="text-center"><a href="../index.php">Home </a> &nbsp;/&nbsp; login</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->


        <div id="alertinfo" style="text-align:center; width:80%; margin:10px auto;">
<?php

$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($url, 'session_expire') == true){
    echo "<p class='suc alert alert-danger'>Warning! Session expired, please login again</p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
}
if(strpos($url, 'invaliduid') == true){
    echo "<p class='suc alert alert-danger'>Warning! User with this account not found.</p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
}
  if(strpos($url, 'tableerror') == true){ 
    echo "<p class='suc alert alert-danger'>Server down! error creating database table  </p>";
    echo "<script>$('.alert-danger').fadeOut(2000)</script>";
  }

	if(strpos($url, 'signupempty') == true){
		echo "<p class='suc alert alert-danger'>Warning! Please, fill out all inputs</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}
    if(strpos($url, 'error') == true){
		echo "<p class='suc alert alert-danger'>Invalid Process...  </p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}
	if(strpos($url, 'invalidemail') == true){
		echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'>Error! Invalid Email Address</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}

	if(strpos($url, 'uidtaken') == true){
		echo "<p class='suc alert alert-danger' style='color:red;font-size:20px;'>Warning! Email or Username already exit</p>";
        echo "<script>$('.alert-danger').fadeOut(2000)</script>";
	}

	if(strpos($url, 'signupsuc') == true){
		echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'> Registration successfully...Please <a href='login.php'> LOGIN </a> </p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
	 }

     if(strpos($url, 'loginempty') == true){
        echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'> Warning! Please fill out all inputs</p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
      }
      if(strpos($url, 'invalidpwd') == true){
        echo "<p class='suc alert alert-success' style='color:green;font-size:15px;'>Error! Invalid Password</p>";
        echo "<script>$('.alert-success').fadeOut(2000)</script>";
      }
      if(strpos($url, 'deactiveacct') == true){
        echo '<script>alert("Warning! Your Investment Account has been deactivated, please contact our support service.");</script>';
      }

?>
</div>
        <!-- START SECTION LOGIN -->
        <div id="login">
            <div class="login">
                <form  method="post" action="../script/loginscript.php">
                    <div class="access_social">
                        <a href="#0" class="social_bt facebook">Login with Facebook</a>
                        <a href="#0" class="social_bt google">Login with Google</a>
                        <a href="#0" class="social_bt linkedin">Login with Linkedin</a>
                    </div>
                    <div class="divider"><span>Or</span></div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <i class="icon_lock_alt"></i>
                    </div>
                    <div class="fl-wrap filter-tags clearfix add_bottom_30">
                        <div class="checkboxes float-left">
                            <div class="filter-tags-wrap">
                                <input id="check-b" type="checkbox" name="check">
                                <label for="check-b">Remember me</label>
                            </div>
                        </div>
                        <div class="float-right mt-1"><a id="forgot" href="javascript:void(0)#;">Forgot Password?</a></div>
                    </div>
                    <button class="btn_1 rounded full-width" name="login" type="submit">Login</button>
                    <div class="text-center add_top_10">New to Find Houses? <strong><a href="register.html">Sign up!</a></strong></div>
                </form>
            </div>
        </div>
        <!-- END SECTION LOGIN -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="../index.php" class="logo">
                                    <img src="../elite_logo.png"  width="150" alt="Logo">
                                </a>
                                
                            </div>
                            <div class="contactus">
                                <ul>
                                    <!-- <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">venue, USA</p>
                                        </div>
                                    </li> -->
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+1 713 987 4317</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@eliteexpertproperties.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Navigation</h3>
                                <div class="nav-footer">
                                
                                    <ul class="nav-right">
                                        <li><a href="../find-agent.php">Agents Details</a></li>
                                        <li><a href="../find-agent.php">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-md-6">
                          
                        </div>
                        <!-- <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <!-- <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <div class="soc-log fl-wrap">
                        <p>Login</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>Or</span></div>
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1">Login</a></li>
                            <li><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username or Email Address * </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password * </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Remember me</label>
                                        </div>
                                    </form>
                                    <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                            <label>First Name * </label>
                                            <input name="name" type="text" onClick="this.select()" value="">
                                            <label>Second Name *</label>
                                            <input name="name2" type="text" onClick="this.select()" value="">
                                            <label>Email Address *</label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label>Password *</label>
                                            <input name="password" type="password" onClick="this.select()" value="">
                                            <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 19:49:34 GMT -->
</html>
