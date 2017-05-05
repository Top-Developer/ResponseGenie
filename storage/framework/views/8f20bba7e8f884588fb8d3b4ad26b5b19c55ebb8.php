<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">

	  	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<title><?php echo $__env->yieldContent('title'); ?> | Rosterfi</title>

		<!-- Favicon -->
		<!-- <link rel="shortcut png" href="/images/favicon.png"> -->
		<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">

		
		<!-- Web Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:700,400,300" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet" type="text/css">

		<!-- Bootstrap core CSS -->
		<!-- <link href="/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
		<link href="/dash_assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- Font Awesome CSS -->
		<!-- <link href="/fonts/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
		<link href="/dash_assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<!-- Fontello CSS -->
		<link href="/fonts/fontello/css/fontello.css" rel="stylesheet">
		<link href="/dash_assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
		<link href="/dash_assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
		<!-- END THEME GLOBAL STYLES -->
		<link href="/dash_assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />	


		<!-- Plugins -->
		<link href="/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="/plugins/rs-plugin/css/settings.css" rel="stylesheet">
		<link href="/css/animations.css" rel="stylesheet">
		<link href="/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">


		<link href="/dash_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/dash_assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


		<!-- the project core CSS file -->
		<link href="/css/style.css" rel="stylesheet">


		<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
		
		<!-- <link href="/css/skins/vivid_red.css" rel="stylesheet"> -->
		<link href="/css/skins/light_blue.css" rel="stylesheet">
		


		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>


		<?php echo $__env->yieldPushContent('asset'); ?>


	</head>

	<!-- body classes -->
	<body class="no-trans front-page transparent-header-on page-loader-4">
		<!-- scrollToTop -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<div class="page-wrapper">
			<!-- header-container start -->
			<div class="header-container">
				<!-- header start -->
				<header class="header  fixed full-width  clearfix transparent-header-on">
					<!-- header-right start -->
					<div class="header-right clearfix">
						<!-- main-navigation start -->
						<div class="main-navigation animated with-dropdown-buttons">
							<!-- navbar start -->
							<nav class="navbar navbar-default" role="navigation" style="position:relative">
								<div class="container-fluid">
									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										<!-- header-left start -->
										<div class="header-left clearfix" style="margin-left:50px">
											<!-- logo -->
											<div id="logo" class="logo">
												<a href="/"><img id="logo_img" src="/img/easy_icon.png" alt="Rosterfi" style="height: 55px;"></a>
											</div>
										</div>
										<!-- header-left end -->													
									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse" id="navbar-collapse-1">
										<!-- main-menu -->
										<ul class="nav navbar-nav navbar-right">
											<!-- submenu start -->
											<li><a href="/">Home</a></li>
											<!-- submenu end -->

											<!-- submenu start -->
											<li><a href="<?php echo e(url('/myaccount')); ?>">My Account</a></li>
											<!-- submenu end -->

											<!-- submenu start -->
											<li><a href="<?php echo e(url('/configclub')); ?>">Clubs</a></li>
											<!-- submenu end -->

											<!-- submenu start -->
											<li><a href="<?php echo e(url('/configevent')); ?>">My Events</a></li>
											<!-- submenu end -->

											<!-- submenu start -->
											<li><a href="/login">Login</a></li>
											<!-- submenu end -->

											<!-- submenu start -->
											<li><a href="/register">Register</a></li>
											<!-- submenu end -->

										</ul>
										<!-- main-menu end -->      
                                 
									</div>
								</div>
							</nav>
							<!-- navbar end -->
						</div>
						<!-- main-navigation end -->	
					</div>
					<!-- header-right end -->
						
					                   
				</header>
				<!-- header end -->
			</div>
			<!-- header-container end -->

			<?php echo $__env->yieldContent('content'); ?>
            
            <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
            <footer id="footer" class="clearfix dark">

                <!-- .footer start -->
                <!-- ================ -->
                <div class="footer">
                    <div class="container">
                        <div class="footer-inner">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="footer-content">
                                        <h3><strong>Rosterfi</strong></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p></p>
                                                <ul class="social-links circle animated-effect-1">
                                                    <li class="facebook"><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="twitter"><a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                                    <li class="googleplus"><a target="_blank" href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                                    <li class="linkedin"><a target="_blank" href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>                                                    
                                                </ul>
                                                <ul class="list-icons">
                                                    <li><i class="fa fa-map-marker pr-10 text-default"></i> Webgasse 42,Brazil 1060</li>
                                                    <li><i class="fa fa-phone pr-10 text-default"></i> +00 1234567890</li>
                                                    <li><a href="mailto:paulokgh@outlook.com"><i class="fa fa-envelope-o pr-10"></i>info@rosterfi.com</a></li>
													<li><a href="#">Help</a></li>
													<li><a href="#">Privacy Policy</a></li>
													<li><a href="#">Terms</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="map-canvas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-content">
                                        <h2 class="title">Contact Us</h2>
                                        <br>
                                        <div class="alert alert-success hidden" id="MessageSent2">
                                            We have received your message, we will contact you very soon.
                                        </div>
                                        <div class="alert alert-danger hidden" id="MessageNotSent2">
                                            Oops! Something went wrong please refresh the page and try again.
                                        </div>                              
                                        <form role="form" id="footer-form" class="margin-clear">
                                            <div class="form-group has-feedback">
                                                <label class="sr-only" for="name2">Name</label>
                                                <input type="text" class="form-control" id="name2" placeholder="Name" name="name2">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="sr-only" for="email2">Email address</label>
                                                <input type="email" class="form-control" id="email2" placeholder="Enter email" name="email2">
                                                <i class="fa fa-envelope form-control-feedback"></i>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="sr-only" for="message2">Message</label>
                                                <textarea class="form-control" rows="6" id="message2" placeholder="Message" name="message2"></textarea>
                                                <i class="fa fa-pencil form-control-feedback"></i>
                                            </div>
                                            <input type="submit" value="Send" class="margin-clear submit-button btn btn-default">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .footer end -->

                <!-- .subfooter start -->
                <!-- ================ -->
                <div class="subfooter">
                    <div class="container">
                        <div class="subfooter-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">Copyright © 2017 Rosterfi. All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .subfooter end -->

            </footer>
            <!-- footer end -->
		</div>
		<!-- page-wrapper end -->
		<?php echo $__env->yieldPushContent('script'); ?>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="/plugins/modernizr.js"></script>

		<!-- jQuery Revolution Slider -->
		<script type="text/javascript" src="/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="/plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		
		<!-- Appear javascript -->
		<script type="text/javascript" src="/plugins/waypoints/jquery.waypoints.min.js"></script>

		<!-- Count To javascript -->
		<script type="text/javascript" src="/plugins/jquery.countTo.js"></script>
		
		<!-- Parallax javascript -->
		<script src="/plugins/jquery.parallax-1.1.3.js"></script>

		<!-- Contact form -->
		<script src="/plugins/jquery.validate.js"></script>

        <!-- Google Maps javascript -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;signed_in=true"></script>
        <script type="text/javascript" src="/js/google.map.config.js"></script>

		<!-- Morphext -->
		<script type="text/javascript" src="/plugins/morphext/morphext.min.js"></script>

		<!-- Background Video -->
		<script src="/plugins/vide/jquery.vide.js"></script>

		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="/plugins/owl-carousel/owl.carousel.js"></script>

		<!-- Pace javascript -->
		<script type="text/javascript" src="/plugins/pace/pace.min.js"></script>
		
		<!-- SmoothScroll javascript -->
		<script type="text/javascript" src="/plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="/plugins/SmoothScroll.js"></script>

		<script type="text/javascript" src="/plugins/moment/min/moment.min.js"></script>
	  	<script type="text/javascript" src="/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	  	
	  	
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="/js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="/js/custom.js"></script>


	</body>


</html>
