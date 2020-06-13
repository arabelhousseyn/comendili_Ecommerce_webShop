
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
