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
	<style>
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
	
	</style>
    <!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
    <!-- //web fonts -->
    <!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="<?php echo $css . 'bootstrap.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="<?php echo $css . 'style.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo $css . 'fontawesome-all.css'; ?>">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="<?php echo $css  . 'popuo-box.css';?>" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="<?php echo $css . 'menu.css'; ?>" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->
</head>
<body <?php if(isset($_SESSION['username'])){if(@$_SESSION['langs'] == 1){echo 'dir="rtl"';} } ?>>
<div class="agile-main-top">
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
								<i style='display:none;' class="fas fa-map-marker mr-2"></i><?php  ?></a>
						</li>
						
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0782903695
						</li>
						<li class="text-center border-right text-white">
						<?php
						if(!isset($_SESSION['username']))
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
                       <a class="dropdown-item" href="<?php echo 'index.php?sk=settings' ;?>"><?php echo lang('account'); ?></a>
                       <a class="dropdown-item" href="<?php echo 'index.php?sk=logout';?>"><?php echo lang('log'); ?></a>
                                </div>
							</div>
							<?php
						}
						?>
							
						</li>
						<li class="text-center text-white">
							<?php
							
							if(!isset($_SESSION['username']))
							{
								?>
								<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i><?php echo lang('reg');?> </a>
								<?php
							}

							?>
							
						</li>
						<li class="text-center text-white">
						<?php if(isset($_SESSION['username'])) : ?>
							<div class="dropdown">
							
							<a href="#" class="text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<?php if($_SESSION['langs'] == 0){echo 'english';}elseif($_SESSION['langs'] == 1){echo 'العربية';}elseif($_SESSION['langs']== 2){echo 'francais';} ?> </a>
						  
													  <div class="dropdown-menu" style='padding:25px;' aria-labelledby="dropdownMenuButton">
												
												<a class="dropdown-item" href="<?php echo 'index.php?langs=' . 0 ;?>"><?php echo lang('en'); ?></a>

												 <a class="dropdown-item" href="<?php echo 'index.php?langs=' . 1 ;?>"><?php echo lang('ar'); ?></a>
												 <a class="dropdown-item" href="<?php echo 'index.php?langs=' . 2;?>"><?php echo lang('fr'); ?></a>
														  </div>
						<?php endif; ?>
													 
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
						<a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="font-weight-bold font-italic">
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
								<input class="form-control mr-sm-2" id='te' name='searchqr' type="search" placeholder="<?php echo lang('sc'); ?>" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name='search' type="submit"><?php echo lang('sc');?></button>
								<div id='sha' class="shows" style='display: none;z-index: 999;position: fixed; margin-top: 73px;background-color: white;'>
								<select id="agileinfo-nav_search" name="categories" class="border">
							<option value=""><?php echo lang('all');?></option>
                            <?php
                            $data = data($con,'SELECT * FROM categories');

                            foreach ($data as $value) {
                            ?>
                            <option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
                        <?php } ?>
						</select>
								</div>
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
