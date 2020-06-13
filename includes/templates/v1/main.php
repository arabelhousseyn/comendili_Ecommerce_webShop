<?php
$tog = false;
if($sk == 'comendili')
{
?>
<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
            <?php
            
            $stm = $con->prepare('SELECT * FROM items ');
            $stm->execute();
          $data =   $stm->fetchAll();
          $i = 0;
            foreach ($data as $value) {
            if(!file_exists($value['name']))
            {

                mkdir($value['name']);
                $myfile = fopen($value['name'] ."/view.php", "w") or die("Unable to open file!");
              $header = '<?php ob_start(); session_start(); $user = (isset($_GET["user"])) ? $user = $_GET["user"] : $user = ""; include("../ini.php"); $dd = (isset($_GET["dd"])) ? $dd = $_GET["dd"] : $dd = "none";' . '$title = (isset($_GET["title"])) ? $title = $_GET["title"] : $title = "comendili";' . '$title="' . $value['name'] . '"; $_SESSION["username"] = $user; ?>';
              $header .= file_get_contents($tmpl . 'header2.php');
			  $header .= file_get_contents($tmpl . 'navbar.php');
			  $header .= file_get_contents($tmpl . 'modals.php');
			  $header .= file_get_contents($tmpl . 'single.php');
			  $header .= file_get_contents($tmpl . 'footer2.php');
                  $txt = $header;
                  fwrite($myfile, $txt);
                fclose($myfile);
               
            } else{
                $myfile = fopen($value['name'] ."/view.php", "w") or die("Unable to open file!");
                $header = '<?php ob_start(); session_start(); $user = (isset($_GET["user"])) ? $user = $_GET["user"] : $user = ""; include("../ini.php"); $dd = (isset($_GET["dd"])) ? $dd = $_GET["dd"] : $dd = "none";' . '$title = (isset($_GET["title"])) ? $title = $_GET["title"] : $title = "comendili";' . '$title="' . $value['name'] . '"; $_SESSION["username"] = $user; ?>';
			  $header .= file_get_contents($tmpl . 'header2.php');
			  $header .= file_get_contents($tmpl . 'navbar.php');
			  $header .= file_get_contents($tmpl . 'modals.php');
			  $header .= file_get_contents($tmpl . 'single.php');
			  $header .= file_get_contents($tmpl . 'footer2.php');
                $txt = $header;
                fwrite($myfile, $txt);
              fclose($myfile); 
              
			}
			$myfile = fopen($value['name'] ."/view.php", "w") or die("Unable to open file!");
                $header = '<?php ob_start(); session_start(); $user = (isset($_GET["user"])) ? $user = $_GET["user"] : $user = ""; include("../ini.php"); $dd = (isset($_GET["dd"])) ? $dd = $_GET["dd"] : $dd = "none";' . '$title = (isset($_GET["title"])) ? $title = $_GET["title"] : $title = "comendili";' . '$title="' . $value['name'] . '"; $_SESSION["username"] = $user; ?>';
			  $header .= file_get_contents($tmpl . 'header2.php');
			  $header .= file_get_contents($tmpl . 'navbar.php');
			  $header .= file_get_contents($tmpl . 'modals.php');
			  $header .= file_get_contents($tmpl . 'single.php');
			  $header .= file_get_contents($tmpl . 'footer2.php');
                $txt = $header;
                fwrite($myfile, $txt);
              fclose($myfile); 
            ?>
			<div class="carousel-item  <?php if($i == 0 ){echo 'active';} ?>" style = 'background: url(<?php echo $photos . $value['image'];  ?>) no-repeat center;
     background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;'>
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get product
								<span><?php echo $value['price'];?></span> Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">
								Sale  <?php echo 'best ' . $value['name']; ?>
							</h3>
							<?php if(isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $value['name'] . '/view.php?dd='. $value['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $value['name'] . '/view.php?dd='. $value['ID'] ; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
            </div>

            
            
			
		<?php $i++; }?>	
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<?php
						
						$stm = $con->prepare('SELECT * FROM categories LIMIT 4');
						$stm->execute();
						$data = $stm->fetchAll();
						foreach ($data as  $value) {
						
						
						
						?>
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic"><?php echo $value ['name'];?></h3>
							<div class="row">
							<?php
							$st = $con->prepare('SELECT * FROM items WHERE cat_id = ? LIMIT 3');
							$st->execute(array($value['ID']));
							 $data = $st->fetchAll();
							 foreach ($data as  $val) {
							
														?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img style='width : 200px; height: 200px;' src="<?php echo $photos . $val['image']; ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
												<?php if(isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart"  href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] . '&user=' .$_SESSION['username']; ?>"> <?php echo lang('quik'); ?> </a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart" href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] ; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<?php if(isset($_SESSION['username'])) : ?>
								<a   href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] . '&user=' .$_SESSION['username']; ?>"> <?php echo $val['name'];?> </a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] ; ?>"><?php echo $val['name'];?> </a>
							<?php endif; ?>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo $val['price']; ?></span>
												<del>
													<?php
													$pr = str_replace('$','',$val['price']);
													$pr = intval($pr);
													$pr -= 200;
													$pr  = strval($pr);
													$pr .= '$';
													echo $pr;
													?>
												</del>
											</div>
											<a href="index.php?sk=products<?php echo  '&dd=' . $value['ID']; ?>" style='margin-top: 42px;'  class='btn btn-sm btn-info'><?php echo lang('view'); ?></a>
										</div>	
												
									</div>
								</div>
								
								<?php }?>

							</div>
						</div>
						<!-- //first section -->
						
						<?php }?>
						
					</div>
				</div>
				
				
<?php
} elseif($sk == 'error')
{
	if(!isset($_SESSION['username']))
	{

	$msg= '';
	if(!$ball)
	{
		$msg = '<li>' .lang('this1').'</li>';
	}
	if(!$ball1)
	{
		$msg .= '<li>' .lang('this2').'</li>';

	}
	if(!$ball2)
	{
		$msg .= '<li>' .lang('this3').'</li>';

	}
	
	
	?>
	<div class="container">
	<div class="alert alert-danger" style='margin-top: 50px;padding: 10px 0 10px 50px;'>
	 <?php echo '<ul>' .  $msg . '</ul>'; ?>
	</div>
	</div>
	
	<?php
} else{
	redirect('index.php');
}	
}elseif($sk == 'success')
{
	?>
	
    <div class="container">
	<div id="logreg-forms" style='padding:25px;'>
        <form class="form-signin" method='post'>
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"><?php echo lang('titleLog'); ?></h1>
            
            <input style='margin-bottom: 20px;' type="text" id="emailoruser" name='emailoruser' class="form-control" placeholder="<?php echo lang('em').' ' . lang('or').' ' .lang('user'); ?>" required>
            <input style='margin-bottom: 20px;' type="password" id="passuser2" name='passuser2' class="form-control" placeholder="<?php echo lang('pass'); ?>" required>
            
            <button class="btn btn-success btn-block" id='login1' name='login1' type="submit"><i class="fas fa-sign-in-alt"></i><?php echo lang('titleLog'); ?></button>
            <a href="index.php?sk=forgot&&dd=1" id="forgot_pswd"><?php echo lang('forgot'); ?></a>

			</form>
            <hr> 
    </div>
	</div>
    
	<?php
}elseif($sk == 'verification')
{
	if(strlen($dd) !== 0 && strlen($ff) !== 0)
	{
	?>
	 <div class="container">
	 <!-- Default form login -->
<form class="text-center border border-light p-5" method='post'>

<input type="hidden" name="em" value='<?php echo $dd; ?>'>
<input type="number" name="code" id="code" class="form-control mb-4" placeholder='<?php echo lang('ver') . ' Email'; ?>'>

<div class="alert alert-danger" style='<?php echo $view; ?>'>
<?php echo $msg; ?>
</div>

<input type="submit" name='ver' value="<?php echo lang('ver'); ?>" class='btn btn-success btn-block my-4'>

</form>

	 
    
	 </div>
	<?php
	
} else{
	header('Location: index.php?sk=success');
}
}elseif($sk == 'logout')
{
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['langs']);
	header('Location: index.php');
}elseif($sk == 'settings')
{
	if(isset($_SESSION['username']))
	{
		$stm = $con->prepare('SELECT * FROM membres WHERE ID = ?');
		$stm->execute(array($_SESSION['id']));
		$data = $stm->fetch();
				?>
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php if(strlen($data['profile_picture']) == 0){echo $photos . 'profile.jpg' ;} else{ if( !file_exists($photos.$data['profile_picture']) ){echo $photos . 'profile.jpg' ;}else{echo $photos . $data['profile_picture'];}  } ?>" alt="profile"/>
                            <div class="file btn btn-lg btn-primary">
                                <?php echo lang('change'); ?>
								<form method="post" enctype="multipart/form-data">
								<input type="file" name="file"/>
								
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $data['username_member']; ?>
                                    </h5>
                                    <h6>
									<?php echo $data['name_member']; ?>
                                    </h6>
                                    <p class="proile-rating"></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo lang('about'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo lang('pur'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
						
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
						<input type="submit" value="upload" class='btn btn-sm btn-info' name='upload'>
							</form>
							<br><br>
							<a href="index.php?sk=delete" class='btn btn-sm btn-danger'><?php echo lang('delete'); ?></a><br/>
                            <p><?php echo lang('type'); ?></p>
                            <a href="">Buyer</a><br/>
							<button class="profile-edit-btn" id='up'><?php echo lang('edit'); ?></button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<form  method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php echo lang('name'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="nameup" id="nameup" value='<?php echo $data['name_member']; ?>' style='outline:none;border:none; background:white;' disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php echo lang('user'); ?></label>
                                            </div>
                                            <div class="col-md-6">
											<input type="text" name="usernameup" id="usernameup" value='<?php echo $data['username_member']; ?>' style='outline:none;border:none; background:white;' disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php echo lang('em'); ?></label>
                                            </div>
                                            <div class="col-md-6">
											<input type="email" name="emailup" id="emailup" value='<?php echo $data['email']; ?>' style='outline:none;border:none; background:white;' disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php echo lang('phone'); ?></label>
                                            </div>
                                            <div class="col-md-6">
											<input type="number" name="phoneup" id="phoneup" value='<?php echo intval(str_replace('213','',$data['phone'])); ?>' style='outline:none;border:none; background:white;' disabled>
											<?php
											if($data['verif_number'] !== '0')
											{
											
												echo '<a href="index.php?sk=verification_number&dd=' . $_SESSION['id'] . '" class="btn btn-sm btn-success" >' . 'confirm</a>';
											} 
											?>
                                            </div>
                                        </div>

										<div class="row">
										<div class="col-md-6">
										<input type="submit" class='btn btn-sm btn-success' id='update' value="<?php echo lang('update'); ?>" name='update'>
										</div>
										</div>
										<br><br>
										<div class="alert alert-<?php echo $type; ?>" style='<?php echo $view; ?>'>
										<?php echo $msg; ?>
										</div>
										</form>
                            </div>
							
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							
                                        <div class="row">
										<?php 
										$stmt1 = $con->prepare('SELECT * FROM requests WHERE id_member = ?');
										$stmt1->execute(array($_SESSION['id']));
										$dt = $stmt1->fetchAll();
										foreach ($dt as $id) {
										 $stmt2 = $con->prepare('SELECT * FROM items WHERE ID = ?');
										 $stmt2->execute([$id['id_product']]);
										 $items = $stmt2->fetchAll();
										 foreach ($items as  $it) {
									
										 
										?>
										<div class="col-md-4 product-men mt-md-0 mt-5 mt-5">
								<div class="men-pro-item simpleCart_shelfItem" style='margin-top: 25px;'>
									<div class="men-thumb-item text-center">
										<img src="<?php echo $photos . $it['image']; ?>" alt="" class="img-fluid">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
											<?php if(isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart" href="<?php echo $it['name'] . '/view.php?dd='. $it['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('quik'); ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart"  href="<?php echo $it['name'] . '/view.php?dd='. $it['ID'] ; ?>"><?php echo lang('quik');  ?></a>
							<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
											<a href="single.html"><?php echo $it['name']; ?></a>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo $it['price']; ?></span>
											<del>
												<?php
												$pr = str_replace('$','',$it['price']);
												$pr = intval($pr);
												$pr -= 200;
												$pr  = strval($pr);
												$pr .= '$';
												echo $pr;
												
												?>
											</del>
										</div>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo 'N :'. $id['transaction']; ?></span>
										</div>
										<div class="info-product-price my-2">
											<span class="item_price"><?php 
											if($id['statu'] == 0)
											{
                                             echo '<span style="color:green;">shipped</span>'; 
											} elseif($id['statu'] == 1){
												echo '<span style="color:yellow;">revision</span>';    
											}else{
												echo '<span style="color:red;">cancelled</span>';    
											}
											 ?></span>
										</div>
										<?php if($id['statu'] == 0):  ?>
											<form action="download.php" method="post">
											<input type="hidden" name="trans1" value='<?php echo $id['transaction']; ?>'>
											<input type="hidden" name="name_by" value='<?php echo $id['name_buyer']; ?>'>
											<input type="hidden" name="qnt1" value='<?php echo $id['qnt']; ?>'>
											<input type="hidden" name="payment1" value='<?php echo $id['payment']; ?>'>
											<input type="submit" name='print' value="<?php echo lang('inv'); ?>" class='btn btn-info'>
											</form>
										<?php endif ?>
										<?php if($id['statu'] == 1):  ?>
											<?php
											if($id['payment'] == 1)
											{
												$chk = $con->prepare('SELECT * FROM payment WHERE transaction_member = ?');
												$chk->execute([$id['transaction']]);
												$chkk = $chk->fetch();
												if(!@$chkk['ID'])
												{
												?>
												<form  method="post">
												<a href="index.php?sk=approve&dd=<?php echo $id['transaction']; ?>" class='btn btn-info'><?php echo lang('send'); ?></a>
												<input type="hidden" name="trranscan" value='<?php echo $id['transaction']; ?>'>
												<input type="submit" class='btn btn-danger' value="<?php echo lang('can'); ?>" name='can' >
												</form>
												<?php

											}
										}else{
												?>
												<form  method="post">
												<input type="hidden" name="trranscan" value='<?php echo $id['transaction']; ?>'>
												<input type="submit" class='btn btn-danger' value="<?php echo lang('can'); ?>" name='can' >
												</form>  
												<?php
											}	
												?>
										<?php endif ?>
									</div>
								</div>
							</div>
									<?php }
}?>

                                        </div>
                                        
                               
                            </div>
						
                        </div>
                    </div>
                </div>
                    
        </div>
		
		<?php
	} else{
		header('Location: index.php?sk=success');
	}
}elseif($sk == 'verification_number')
{
	if(isset($_SESSION['username']))
	{
		?>
		<div class="container">
	 <!-- Default form login -->
<form class="text-center border border-light p-5" method='post'>

<input type="hidden" name="keyup" value='<?php echo $dd; ?>'>
<input type="number" name="code1" id="code1" class="form-control mb-4" placeholder='<?php echo lang('ver') . ' phone'; ?>'>
<div class="alert alert-danger" style='<?php echo $view; ?>'>
<?php echo $msg; ?>
</div>

<input type="submit" name='ver1' value="<?php echo lang('ver'); ?>" class='btn btn-success btn-block my-4'>

</form>

	 
    
	 </div>
		
		<?php
	} else{
		header('Location: index.php?sk=success');	
	}
} elseif($sk == 'delete')
{
	if(isset($_SESSION['username']))
	{
		$stm = $con->prepare('DELETE FROM membres WHERE ID = ?');
		$stm->execute(array($_SESSION['id']));
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['id']);
		unset($_SESSION['langs']);

		header('Location: index.php');
		exit();

	} else{
		header('Location: index.php');
	}
}elseif($sk == 'forgot')
{
	if(@!$_SESSION['username'])
	{
		if($dd == '1')
	{

	
	?>
	<div class="container">
	 <!-- Default form login -->
<form class="text-center border border-light p-5" method='post'>

<input type="text" name="emfor" id="emfor" class="form-control mb-4" placeholder='<?php echo lang('em'); ?>'>
<input type="number" name="codefor" id="codefor" class="form-control mb-4" placeholder='<?php echo lang('ver') . ' Email'; ?>'>
<button type='submit' name='sendCode' class='btn btn-sm btn-info form-control'>send Code</button>

<div class="alert alert-danger" style='<?php echo $view; ?>'>
<?php echo $msg; ?>
</div>

<input type="submit" name='vercode' value="<?php echo lang('ver'); ?>" class='btn btn-success btn-block my-4'>

</form>
	 </div>
	<?php
	}elseif($dd == '2')
	{
		if(isset($_SESSION['prev']))
		{

		?>
		<div class="container">
	 <!-- Default form login -->
<form class="text-center border border-light p-5" method='post'>

<input type="password" name="passtrd" id="passtrd" class="form-control mb-4" placeholder='<?php echo lang('pass'); ?>'>
<input type="password" name="passtrd1" id="passtrd1" class="form-control mb-4" placeholder='<?php echo 'renter ' .  lang('pass'); ?>'>

<div class="alert alert-danger" style='<?php echo $view; ?>'>
<?php echo $msg; ?>
</div>

<input type="submit" name='vercode1' value="<?php echo lang('ver'); ?>" class='btn btn-success btn-block my-4'>

</form>
	 </div>
		
		<?php

		} else{
          header('Location: index.php');
		}
	} else{
		header('Location: index.php');
	}
}else{
	header('Location: index.php');
}
}elseif($sk == 'products')
{
	$check = $con->prepare('SELECT * FROM categories WHERE ID = ?');
	$check->execute(array($dd));
	$results = $check->fetch();

	if(@$results['ID'])
	{
		$stm = $con->prepare('SELECT * FROM items WHERE cat_id = ?');
		$stm->execute(array($dd));
		$data = $stm->fetchAll();
		?>
         <div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php"><?php echo lang('home');  ?></a>
					<i>|</i>
				</li>
				<li><?php echo $results['name']; ?></li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- top Products -->
<div class="ads-grid  py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<?php echo $results['name']; ?></h3>
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
				
						
					
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
						<div class="row">
						<?php
						foreach ($data as  $val) {
						?>
							<div class="col-md-4 product-men mt-md-0 mt-5 mt-5">
								<div class="men-pro-item simpleCart_shelfItem" style='margin-top: 25px;'>
									<div class="men-thumb-item text-center">
										<img src="<?php echo $photos . $val['image']; ?>" alt="" class="img-fluid">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
											<?php if(isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart" href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart"  href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] ; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
										<?php if(isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo $val['name']; ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] ; ?>"><?php echo $val['name']; ?></a>
							<?php endif; ?>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo $val['price']; ?></span>
											<del>
												<?php
												$pr = str_replace('$','',$val['price']);
												$pr = intval($pr);
												$pr -= 200;
												$pr  = strval($pr);
												$pr .= '$';
												echo $pr;
												
												?>
											</del>
										</div>
										<div class="item-info-product text-center border-top mt-4">
										<span><?php echo $status[$val['status']]; ?></span>
										
										</div>
										<?php if(isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $val['name'] . '/view.php?dd='. $val['ID'] ; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						
					</div>
				
				</div>
			</div>
			
		

		<?php
		
	}else{
		header('Location: index.php');
	}
}elseif($sk == 'search')
{

	 
	$text = $_SESSION['search'];
	$second='';
	$l = strtoupper($text[0]);
	$second .= $l;
	$type=false;
	$ids = array();

	$text = substr($text,1);

	for ($i=0; $i <strlen($text) ; $i++) { 
		$second .= $text[$i];
	}

	if(strlen($dd) !== 0)
	{

$stmt = $con->prepare('SELECT * FROM categories WHERE name = ?');
	$stmt->execute(array($dd));
	$categorie = $stmt->fetch();
	//////////////////////////////////////////////////
	$st = $con->prepare('SELECT * FROM items WHERE cat_id = ?');
	$st->execute(array($categorie['ID']));
	$names = $st->fetchAll();
	foreach ($names as  $nms) {
		$temp = $nms['name'];
		for ($j=0; $j <2 ; $j++) { 
			if($second[$j] == $temp[$j])
			{
				 $type=true;
				 $ids[] = $nms['ID'];
			break;
			}
		}
	}
	if($type)
	{
		
	  ?>
	
         <div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php"><?php echo lang('home');  ?></a>
					<i>|</i>
				</li>
				<span><?php echo $dd; ?></span>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- top Products -->
<div class="ads-grid  py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
				
						
					
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
						<div class="row">
						<?php
						foreach ($ids as  $value) {
			
	
							$stm = $con->prepare('SELECT * FROM items WHERE ID = ?');
							$stm->execute(array($value));
							$data = $stm->fetch();
						?>
							<div class="col-md-4 product-men mt-md-0 mt-5 mt-5">
								<div class="men-pro-item simpleCart_shelfItem" style='margin-top: 25px;'>
									<div class="men-thumb-item text-center">
										<img src="<?php echo $photos . $data['image']; ?>" alt="" class="img-fluid">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
											<?php if(isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart"  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
										<?php if(isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo $data['name']; ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo $data['name']; ?></a>
							<?php endif; ?>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo $data['price']; ?></span>
											<del>
												<?php
												$pr = str_replace('$','',$data['price']);
												$pr = intval($pr);
												$pr -= 200;
												$pr  = strval($pr);
												$pr .= '$';
												echo $pr;
												
												?>
											</del>
										</div>
										<div class="item-info-product text-center border-top mt-4">
										<span><?php echo $status[$data['status']]; ?></span>
										
										</div>
										<?php if(isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						
					</div>
				
				</div>
			</div>
	  <?php
	  	
	}else{
		echo 'not found';
	}

	}else{
		
		$st2 = $con->prepare('SELECT * FROM items');
		$st2->execute();
		$names = $st2->fetchAll();
		foreach ($names as  $nm) {
			$temp = $nm['name'];
			for ($k=0; $k <2 ; $k++) { 
				if($second[$k] == $temp[$k])
				{
					 $type=true;
					 $ids[] = $nm['ID'];
				break;
				}
			}
		}
		if($type)
		{
			?>
			   <div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php"><?php echo lang('home');  ?></a>
					<i>|</i>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- top Products -->
<div class="ads-grid  py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
				
						
					
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
						<div class="row">
						<?php
						foreach ($ids as  $value) {
			
	
							$stm = $con->prepare('SELECT * FROM items WHERE ID = ?');
							$stm->execute(array($value));
							$data = $stm->fetch();
						?>
							<div class="col-md-4 product-men mt-md-0 mt-5 mt-5">
								<div class="men-pro-item simpleCart_shelfItem" style='margin-top: 25px;'>
									<div class="men-thumb-item text-center">
										<img src="<?php echo $photos . $data['image']; ?>" alt="" class="img-fluid">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
											<?php if(isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="link-product-add-cart"  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo lang('quik'); ?> </a>
							<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
										<?php if(isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo $data['name']; ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a  href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo $data['name']; ?></a>
							<?php endif; ?>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo $data['price']; ?></span>
											<del>
												<?php
												$pr = str_replace('$','',$data['price']);
												$pr = intval($pr);
												$pr -= 200;
												$pr  = strval($pr);
												$pr .= '$';
												echo $pr;
												
												?>
											</del>
										</div>
										<div class="item-info-product text-center border-top mt-4">
										<span><?php echo $status[$data['status']]; ?></span>
										
										</div>
										<?php if(isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] . '&user=' .$_SESSION['username']; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
							<?php if(!isset($_SESSION['username'])) : ?>
								<a class="button2" href="<?php echo $data['name'] . '/view.php?dd='. $data['ID'] ; ?>"><?php echo lang('shop'); ?></a>
							<?php endif; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						
					</div>
				
				</div>
			</div>
			<?php
		}else{
			$tog = true;
			if($tog)
			{
			?>
		     <div class="container">
				 <h1>not found</h1>
			 </div>
			
			<?php
			}
		}

	}
	
	
	

	 if(isset($_SESSION['search']))
	 {
		unset($_SESSION['search']);
	 }else{
		 header('Location: index.php');
	 }

} elseif($sk == 'checkout')
{
	if(isset($_SESSION['username']))
	{
		$stm = $con->prepare('SELECT * FROM items WHERE ID = ?');
		$stm->execute(array($dd));
		$data = $stm->fetch();
		if(@$data['ID'])
		{
	?>
	<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php"><?php echo lang('home'); ?></a>
					<i>|</i>
				</li>
				<li><?php echo lang('check'); ?></li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<?php echo lang('check'); ?>
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			
			<div class="table-responsive">
				<table class="timetable_sub table table-striped">
					<thead>
						<tr>
							<th>SL No.</th>
							<th><?php echo lang('product'); ?></th>
							<th><?php echo lang('qn'); ?></th>
							<th><?php echo lang('productnm'); ?></th>
							<th><?php echo lang('pr'); ?></th>
							
						</tr>
					</thead>
					<tbody>
						<tr class="rem1">
							<td class="invert">1</td>
							<td class="invert-image">
								<a href="<?php $_SERVER['PHP_SELF'];?>">
									<img style='width: 55px; height:55px;' src="<?php echo $photos . $data['image']; ?>" alt=" " class="img-responsive">
								</a>
							</td>
							<td class="invert">
								<div class="quantity">
									<div class="quantity-select">
										<div   class="entry value-minus">&nbsp;</div>
										<div class="entry value">
											<span class='qnt_show'><?php echo $_SESSION['qnt']; ?> </span>
											<form  method="post" class="creditly-card-form agileinfo_form">
											<input type="hidden" class='qnt' name='qnt' value='<?php echo $_SESSION['qnt']; ?>'>
											<input type="hidden" name="getin" class='getin'>
											<input type="hidden" name="switch" class='switch'>
										</div>
										<div class="entry value-plus active">&nbsp;</div>
									</div>
								</div>
							</td>
							<td class="invert"><?php echo $data['name']; ?></td>
							<td class="invert"><?php 
							$pr = str_replace('$','',$data['price']);
							$pr = intval($pr);
							$pr -= 200;
							$pr  = strval($pr);
							$pr .= '$';
							echo $pr;
							?></td>

						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="checkout-left">
			<div class="address_form_agile mt-sm-5 mt-4">
				<h4 class="mb-sm-4 mb-3"><?php echo lang('add'); ?></h4>
				
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls form-group">
								<input type="hidden" name="idadress" value='<?php echo $dd; ?>'>
									<input class="billing-address-name form-control" type="text" name="namedel" id='namedel' placeholder="<?php echo lang('name'); ?>" required="">
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left form-group">
										<div class="controls">
											<input type="text" class="form-control" placeholder="<?php echo lang('mobile'); ?>" name="numberdel" id='numberdel' required="">
										</div>
									</div>
									
								</div>
								<div class="controls form-group">
									<input type="text" class="form-control" placeholder="<?php echo lang('adress'); ?>" name="adressdel" id='adressdel' required="">
								</div>
								
							</div>
							<button class="submit check_out btn" name='addadress' id='addadress' type='submit'><?php echo lang('del'); ?></button>
							
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
	<?php

		?>
		<?php
		}else{
			header('Location: index.php');
		}

	} else{
		header('Location: index.php?sk=success');
	}
}elseif($sk == 'payment')
{
	
	  if(isset($_SESSION['username']))
	  {
		  
		  $stm = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
		  $stm->execute(array($trans));
		  $data = $stm->fetch();
		  if(@$data['ID'])
		  {
			if($ff == 0)
			{
			?>
			<div class="container" style='margin-top:25px;'>
			<h1 class='title' style='margin-bottom:10px;'><?php echo lang('selpm'); ?></h1>
			<form method='post'>
  <div class="form-row">
    <div class="form-group col-md-12">
      <select id="inputState" name='selectmp' class="form-control">
        <option value='<?php echo lang('post'); ?>'> <?php echo lang('post'); ?> </option>
		<option value="<?php echo lang('ppl'); ?>"> <?php echo lang('ppl'); ?> </option>
      </select>
    </div>
	</div>
  <input type="submit" value="<?php echo lang('select'); ?>" name='selectmt' class='btn btn-info'>
</form>
			</div>
			<?php
			
		  } elseif($ff == 1) {
			  if(isset($_SESSION['method']))
			  {
				$st = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
				$st->execute(array($trans));
				$data = $st->fetch();
				  if($_SESSION['method'] == 1)
				  {
					
					  ?>
					 <div class="container text-center" style='margin-top:25px; margin-right:60px;'>
					 <div class="card text-center" style="width: 18rem; margin-bottom: 25px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo lang('info'); ?></h5>
	<p class="card-text"> N: <?php echo $data['transaction']; ?></p>
    <p class="card-text"><?php echo lang('name') .' : ' . $data['name_buyer']; ?></p>
	<p class="card-text"><?php echo lang('qn') . ' : ' .  $data['qnt']; ?></p>
	<p class="card-text"><?php echo lang('payment') . ' : '   ?> <?php if($data['payment'] == 1){echo lang('post');}else{echo lang('ppl');} ?></p>
	<form action="download.php" method="post">
	<input type="hidden" name="trans1" value='<?php echo $data['transaction']; ?>'>
	<input type="hidden" name="name_by" value='<?php echo $data['name_buyer']; ?>'>
	<input type="hidden" name="qnt1" value='<?php echo $data['qnt']; ?>'>
	<input type="hidden" name="payment1" value='<?php echo $data['payment']; ?>'>
	<button class='btn btn-primary' type='submit' name='print'><?php echo lang('inv'); ?></button>
	</form>
  </div>
</div>
<div class="alert alert-info">
<?php echo lang('plsinv'); ?>
<br>
<a href="index.php?sk=approve&dd=<?php echo $trans; ?>" class='btn btn-info'><?php echo lang('send'); ?></a>
</div>
<img src="<?php echo $img . 'ccp.png'; ?>" alt="ccp" style='width:400px;'>
					 </div>
					  <?php
					

				  }elseif($_SESSION['method'] == 0)
				  {
					 ?>
					  <div class="container">
					  <a style='margin-top: 103px;position: relative;left: 50%;' href="payment.php?tr=<?php echo $_SESSION['trans']; ?>" class='btn btn-info'> <img style='width:100px;' src="<?php echo $img . 'paypal.png'; ?>" alt=""></a>
					  </div>
					  <?php  
				  }
				  
			  }else{
				header('Location: index.php');   
			  }
		  }elseif($ff == 'success'){
            echo 'yes';
		  }elseif($ff == 'error')
		  {
          echo 'no';
		  }else{
			header('Location: index.php');
		  }
		}
	  }
	  else{
		header('Location: index.php');
	}
}elseif($sk == 'approve')
{
	$stm = $con->prepare('SELECT * FROM requests WHERE transaction = ?');
	$stm->execute([$dd]);
	$check = $stm->fetch();
	if(@$check['ID'])
	{
		?>
		<div class="container" style='margin-top:25px;'>
		<div class="alert alert-info">
		<h4><?php echo lang('plsinv'); ?></h4>
		</div>
		<form  method="post" enctype = "multipart/form-data">
		<input type="hidden" name="trans10" value='<?php echo $dd; ?>'>
		<div class="input-group">
		<div class="custom-file">
    <input type="file" name='selectclip' class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile"><?php echo lang('chimg'); ?></label>
  </div>
		</div>
		<div class="alert alert-<?php echo $type; ?>" style='<?php echo $view; ?>     margin-top: 5px;'>
		<?php echo $msg;  ?>
		</div>
  <div class="input-group">
  <input type="submit" name='sendimg' style='margin-top:7px;' class='btn btn-info' value="<?php echo lang('upload'); ?>">
  </div>
		</form>
		</div>
		<?php

	}else{
		header('Location: index.php');
	}
}elseif($sk == 'contact')
{
	?>
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php"><?php echo lang('home'); ?></a>
						<i>|</i>
					</li>
					<li><?php echo lang('contactus'); ?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo lang('contactus'); ?>
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3"><?php echo lang('adress'); ?></h4>
						<p>log cem attba djilali z06 chorfa chlef
							<label>algeria.</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3"><?php echo lang('call'); ?></h4>
						<p>+213782903695
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3"><?php echo lang('em'); ?></h4>
						<p>
							<a href="mailto:potency.football@gmail.com">potency.football@gmail.com</a>
						</p>
					</div>
				</div>
			</div>
			<!-- form -->
			<form  method="post">
				<div class="contact-grids1 w3agile-6">
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label"><?php echo lang('name'); ?></label>
							<input type="text" class="form-control" name="namecontact" placeholder="<?php echo lang('name'); ?>" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label"><?php echo lang('em'); ?></label>
							<input type="email" class="form-control" name="emailcontact" placeholder="<?php echo lang('em'); ?>" required="">
						</div>
					</div>
					<div class="contact-me animated wow slideInUp form-group">
						<label class="col-form-label"><?php echo lang('ms'); ?></label>
						<textarea name="msgcontact" class="form-control" placeholder="<?php echo lang('ms'); ?>" required=""> </textarea>
					</div>
					<div class="contact-form">
						<input type="submit" name='contact' value="Submit">
					</div>
				</div>
			</form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->
	
	<?php
}elseif($sk == 'about')
{
	?>
	<div class="page-head_agile_info_w3l">

	</div>

	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html"><?php echo lang('home'); ?></a>
						<i>|</i>
					</li>
					<?php echo lang('aboutt'); ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<?php echo lang('aboutt'); ?>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-6 welcome-left">
					<h3><?php echo lang('welcome'); ?></h3>
					<h4 class="my-sm-3 my-2">
						<?php
						$github = 'github';
						if(!isset($_SESSION['langs']))
						{
						   echo 'With you, elhousseyn arab  the electronics website programmer, the site is free, you can download it from github For modification and addition';
						}else{
							if($_SESSION['langs'] == 0)
							{
								echo 'With you, Hussein, the godfather of the electronics programmer, the site is free, you can download it from github For modification and addition';
							}elseif($_SESSION['langs'] == 1)
							{
								echo 'معكم حسين عراب مبرمج الإلكترونيات الموقع مجاني يمكنكم تحميله من ' .$github. ' للتعديل والإضافة';
								

							}elseif($_SESSION['langs'] == 2)
							{
								echo 'Avec vous, elhousseyn arab le programmeur du site électronique, le site est gratuit, vous pouvez le télécharger depuis github Pour modification et ajout';

							}
						}
						?>
					</h4>

				</div>
				<div class="col-lg-6 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="<?php echo $img . 'ab.jpg'; ?>" class="img-fluid" alt=" ">
				</div>
			</div>
		</div>
	</div>
	<?php
}elseif($sk == 'not'){
	header('Location: index.php');
}else{
	header('Location: index.php');
}


?>