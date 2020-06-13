<?php ob_start(); session_start(); $user = (isset($_GET["user"])) ? $user = $_GET["user"] : $user = ""; include("../ini.php"); $dd = (isset($_GET["dd"])) ? $dd = $_GET["dd"] : $dd = "none";$title = (isset($_GET["title"])) ? $title = $_GET["title"] : $title = "comendili";$title="Haier 80 cm (32 Inches) HD Ready LED TV LE32K6000B (Black)"; $_SESSION["username"] = $user; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content=" Store web shopping  commendili "/>
    <title><?php echo $title; ?></title>
    <script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
    </script>
    <!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
    <!-- //web fonts -->
    <!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="<?php echo '../' .  $css . 'bootstrap.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="<?php echo '../' .  $css . 'style.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo '../' . $css . 'fontawesome-all.css'; ?>">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="<?php echo '../' .  $css  . 'popuo-box.css';?>" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="<?php echo '../' .  $css . 'menu.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->
</head>
<body <?php if(isset($_SESSION['username'])){if(@$_SESSION['langs'] == 1){echo 'dir="rtl"';} } ?>>
<div class="agile-main-top" >
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center"><?php echo lang('top'); ?>
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i  style='display:none;' class="fas fa-map-marker mr-2"></i><?php  ?></a>
						</li>
						
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0782903695
						</li>
						<li class="text-center border-right text-white">
					
						<?php
						if(isset($_SESSION['username']))
						{
							if(empty($_SESSION['username']))
							{
								?>
								<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> <?php echo lang('titleLog');?> </a>

								<?php
							} else{
								?>
								<div class="dropdown">
							
							<a href="#" class="text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														  <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?> </a>
						  
													  <div class="dropdown-menu" style='padding:25px;' aria-labelledby="dropdownMenuButton">
												 <a class="dropdown-item" href="<?php echo '../index.php?sk=settings' ;?>"><?php echo lang('account'); ?></a>
												 <a class="dropdown-item" href="<?php echo '../index.php?sk=logout';?>"><?php echo lang('log'); ?></a>
														  </div>
													  </div>
								<?php
							}
						}
						?>
							
						</li>
						<li class="text-center text-white">
							<?php
							
							if(isset($_SESSION['username']))
							if(empty($_SESSION['username'])){
							{
								?>
								<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i><?php echo lang('reg');?> </a>
								<?php
								}
							}

							?>
							
						</li>
						<li class="text-center text-white">
						<?php if(isset($_SESSION['username'])) :  if(!empty($_SESSION['username'])) : ?>
							<div class="dropdown">
							
							<a href="#" class="text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<?php if($_SESSION['langs'] == 0){echo 'english';}elseif($_SESSION['langs'] == 1){echo 'العربية';}elseif($_SESSION['langs']== 2){echo 'francais';} ?> </a>
						  
													  <div class="dropdown-menu" style='padding:25px;' aria-labelledby="dropdownMenuButton">
												
												<a class="dropdown-item" href="<?php echo '../index.php?langs=' . 0 ;?>"><?php echo lang('en'); ?></a>

												 <a class="dropdown-item" href="<?php echo '../index.php?langs=' . 1 ;?>"><?php echo lang('ar'); ?></a>
												 <a class="dropdown-item" href="<?php echo '../index.php?langs=' . 2;?>"><?php echo lang('fr'); ?></a>
														  </div>
						<?php endif;endif; ?>
						
													 
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
    </div>
    
    <div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="../index.php" class="font-weight-bold font-italic">
					<!--	<img src="images/logo2.png" alt=" " class="img-fluid"> -->	comendili
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline"  method="post">
								<input class="form-control mr-sm-2" name='searchqr' type="search" placeholder="<?php echo lang('sc'); ?>" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name='search' type="submit"><?php echo lang('sc');?></button>
								</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- navigation -->
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="<?php echo lang('PHP_SELF');?>"><?php echo lang('home');?>
								<span class="sr-only">(current)</span>
							</a>
						</li>
						
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo lang('el'); ?>
							</a>
							
							<div class="dropdown-menu">
							
								<div class="agile_inner_drop_nav_info p-4">
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
								
										<ul class="multi-column-dropdown">
										 <?php 
										 
										 $infos = data($con,'SELECT * FROM categories');
										 foreach ($infos as  $value) {								
											 	 ?>
										<li>
													<a href="index.php?sk=products&dd=<?php echo $value['ID']; ?>"><?php echo $value['name'];  ?></a>
												</li>

										 <?php }?>
						
						  </ul>
										</div>
										
									</div>
								</div>
						
							</div>
						</li>
					
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php?sk=about"><?php echo lang('about'); ?></a>
						</li>
						
						
						<li class="nav-item">
							<a class="nav-link" href="index.php?sk=contact"><?php echo lang('contact'); ?></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->


	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center"><?php echo lang('titleLog'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('user') .' ' .lang('or') . ' ' .lang('em') ; ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('user') .' ' .lang('or') . ' ' .lang('em') ; ?>" name="user" id='user' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('pass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('pass');  ?>" name="pass" id='pass' required>
						</div>
						<div class="right-w3l">
							<input type="submit" name='login' class="form-control" value="<?php echo lang('titleLog'); ?>">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing"><?php echo lang('rem'); ?></label>
							</div>
							<a href="index.php?sk=forgot&&dd=1" id="forgot_pswd"><?php echo lang('forgot'); ?></a>
						</div>
						<p class="text-center dont-do mt-3"><?php echo lang('dn'); ?>
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								<?php echo lang('regn'); ?></a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><?php echo lang('reg'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post">
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('name'); ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('name'); ?>" name="addname" id='addname' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('user'); ?></label>
							<input type="text" class="form-control" placeholder="<?php echo lang('user'); ?>" name="adduser" id='adduser' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('em'); ?></label>
							<input type="email" class="form-control" placeholder="<?php echo lang('em'); ?>" name="addemail" id='addemail' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('phone'); ?></label>
							<input type="number" class="form-control" placeholder="<?php echo lang('phone'); ?>" name="addphone" id='addphone' min ='1' required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('pass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('pass'); ?>" name="addpass" id="password1" required>
						</div>
						<div class="form-group">
							<label class="col-form-label"><?php echo lang('repass'); ?></label>
							<input type="password" class="form-control" placeholder="<?php echo lang('repass'); ?>" name="addpass1" id="password2" required>
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name='register' value="<?php echo lang('reg'); ?>">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2"><?php echo lang('accept'); ?></label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<?php
	 $st = $con->prepare('SELECT * FROM items WHERE ID = ? ');
	 $st->execute(array($dd));
   $dt =   $st->fetch();
   
	
	?>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html"><?php echo lang('home'); ?></a>
						<i>|</i>
					</li>
					<li><?php echo $dt['name']; ?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ver
				<span>V</span>iew</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="<?php echo '../' . $photos . $dt['image'];  ?>">
									<div class="thumb-image">
										<img src="<?php echo '../' . $photos . $dt['image'];  ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $dt['name'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo $dt['price'] ?></span>
						<del class="mx-2 font-weight-light">
							<?php
							$pr = str_replace('$','',$dt['price']);
							$pr = intval($pr);
							$pr -= 200;
							$pr  = strval($pr);
							$pr .= '$';
							echo $pr;
							?>

						</del>
						<label>Free delivery</label>
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
								Cash on Delivery Eligible.
							</li>
							<li class="mb-3">
								Shipping Speed to Delivery.
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>1 Year</label>Manufacturer Warranty</p>
						<?php
						echo $dt['description'];
						?>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>cash on delivery
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="<?php echo $dt['name']; ?>" />
									<input type="hidden" name="item_id" value="<?php echo $dt['ID']; ?>" />
									<input type="hidden" name="amount" value="<?php echo $dt['price']; ?>" />
									<input type="hidden" name="discount_amount" value="1.00" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<input type="hidden" name="link" id='link' value="checkout" />
									<input type="hidden" name="bf" id='ref' value="<?php echo $dt['ID']; ?>" />
									<input type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2"><?php echo lang('el'); ?> :</h2>
				<p class="footer-main mb-4">
					<?php echo lang('text'); ?></p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('free'); ?></h3>
								<p><?php echo lang('desfree'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('fast'); ?></h3>
								<p><?php echo lang('desfast'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3><?php echo lang('big'); ?></h3>
								<p><?php echo lang('desbig'); ?></p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('cat'); ?></h3>
						<ul>
						<?php 
						$info = data($con,'SELECT * FROM categories');
						foreach ($info as  $print) {
						?>
							<li class="mb-3">
								<a href="index.php?sk=products&dd=<?php echo $print['ID']; ?>"><?php echo $print['name']; ?> </a>
							</li>
					<?php } ?>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('qklink'); ?></h3>
						<ul>
							<li class="mb-3">
								<a href="index.php?sk=about"><?php echo lang('about'); ?></a>
							</li>
							<li class="mb-3">
								<a href="index.php?sk=contact"><?php echo lang('contact'); ?></a>
							</li>

						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('get'); ?></h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> Log cem attba djilali z06 chorfa chlef</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> 0782903695 </li>
							<li class="mb-3">
							
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:potency.football@gmail.com"> potency.football@gmail.com</a>
							</li>
							<li>
								
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3"><?php echo lang('news'); ?></h3>
						<p class="mb-3"><?php echo lang('desnews'); ?></p>
						<form  method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3"><?php echo lang('follow'); ?></h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="https://www.facebook.com/ynuzi">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="https://twitter.com/elhousseynarab">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
		<div class="agile-sometext py-md-5 py-sm-4 py-3">
			<div class="container">
				
				
				<div class="sub-some child-momu mt-4">
					<h5 class="font-weight-bold mb-3"><?php echo lang('payment'); ?></h5>
					<ul>
						<li><?php echo lang('cash'); ?></li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
		</div>
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">©  <script> var d = new Date(); document.write(d.getFullYear()); </script> 
				<a href="https://www.facebook.com/ynuzi"> Elhousseyn arab</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->
	

	<!-- js-files -->
	<!-- jquery -->
	<script src="<?php echo '../' .  $js  . 'jquery-2.2.3.min.js'; ?>"></script>
		<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="<?php echo '../' .  $js . 'jquery.magnific-popup.js'; ?>"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="<?php echo '../' .  $js . 'minicart1.js';?>"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="<?php echo '../' .  $js . 'scroll.js'; ?>"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="<?php echo '../' .  $js . 'SmoothScroll.min.js'; ?>"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo '../' .  $js . 'move-top.js'; ?>"></script>
	<script src="<?php echo '../' .  $js . 'easing.js'; ?>"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
		$(document).ready(function(){
			var sha= $('#sha'),
		te = $('#te');
		te.keyup(function(){
			sha.fadeIn(1000);
		});
		te.focus(function(){
			sha.fadeOut(1000);
		});
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo '../' .  $js . 'bootstrap.js'; ?>"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->


</body>

</html>