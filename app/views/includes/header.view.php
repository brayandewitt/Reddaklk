
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
    <title><?=ucfirst(APP::$page)?> - <?=APP_NAME?></title>
	<!--
		CSS
		============================================= -->
        <link rel="stylesheet" href=" <?= ROOT ?>/assets/css/linearicons.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/themify-icons.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/nice-select.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/nouislider.min.css">
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href=" <?= ROOT ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href=" <?= ROOT ?>/assets/css/main.css">

<!--
		icon
		============================================= -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!--
		font
		============================================= -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Tilt+Neon&display=swap" rel="stylesheet">


<!--
		js
		============================================= -->


<script type="text/javascript" defer > const ROOT = '<?= ROOT ?>' </script>
    <script defer src=" <?= ROOT ?>/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script defer src=" <?= ROOT ?>/assets/js/vendor/bootstrap.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/jquery.ajaxchimp.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/jquery.nice-select.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/jquery.sticky.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/nouislider.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/countdown.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/jquery.magnific-popup.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script defer src=" <?= ROOT ?>/assets/js/gmaps.min.js"></script>
	<script defer src=" <?= ROOT ?>/assets/js/main.js"></script>

</head>

<body class="bgimg">
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="<?= ROOT ?>/assets/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?= ROOT ?>/home">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/category">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/single-product">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/checkout">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/cart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/confirmation">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/blog">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/single-blog">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
								<?php if(!Auth::logged_in()):?>
                                	<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/login">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/register">Register</a></li>
									<?php else:?>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/logout">logout</a></li>
									<?php endif;?>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/tracking">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/elements">Elements</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="<?= ROOT ?>/contact">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
    
	

