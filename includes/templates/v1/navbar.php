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