
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
	</div>